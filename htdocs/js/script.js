document.addEventListener('DOMContentLoaded', (e)=>{

    const postForm = document.getElementById('postForm');
    const errorBox = document.getElementById('errorBox');

    //コメント読み込み
    loadComments();

    postForm.addEventListener('submit', (e)=>{
        e.preventDefault();

        // 前回のエラーをクリア
        errorBox.innerHTML = '';
        const errors = [];

        const name = document.getElementById('name').value.trim();
        const comment = document.getElementById('comment').value.trim();

        //validation
        if (name === '') {
            errors.push('名前を入力してください。');
        }

        if (comment === '') {
            errors.push('コメントを入力してください。');
        }

        if (errors.length > 0) {
            errors.forEach(err => {
                const p = document.createElement('p');
                p.textContent = `${err}`;
                errorBox.appendChild(p);
            });
            return; //バリデーション失敗時終了
        }

        fetch('./api/post.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({name, comment})
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                postForm.reset();
                alert('投稿しました');
                loadComments();//コメント一覧更新
            } else {
                errorBox.textContent = data.message || '投稿失敗';
            }
        })
        .catch( err => {
            console.error(err);
            errorBox.textContent = '通信エラー';
        });
    });
});

//コメント表示
function loadComments(){
    fetch('./api/list.php')
        .then(res => res.json())
        .then(data => {
            const commentArea = document.getElementById('commentArea');
            commentArea.innerHTML = '';

            if (data.success && data.comments.length > 0) {
                data.comments.forEach(comment => {
                    const div = document.createElement('div');
                    div.classList.add('commentItem');
                    div.innerHTML = `
                    <p>${escapeHtml(comment.comment)}</p>
                    <div class="d-flex gap-2"><p><strong>${escapeHtml(comment.name)}</strong></p><p><small>${comment.created_at}</small></p></div>
                    <hr>
                    `;
                    commentArea.appendChild(div);
                });
            } else {
                commentArea.innerHTML = '<p>コメントなし</p>';
            }
        })
        .catch(err => {
            console.error('読み込み失敗', err);
        })
}

function escapeHtml(str) {
    return str.replace(/[&<>"']/g, function(match) {
        return ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;',
        })[match];
    });
}