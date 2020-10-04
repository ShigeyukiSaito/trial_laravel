<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録情報編集</title>

    <style>
        html, body {
            background-color: #DDDDDD;
            color: #000000;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0 ;
        }
        header {
            background-color: #DDDDDD;
            width: 100%;
            height: 10%;
            /*padding-left: 10%;*/
        }
        header label {
            position: absolute;
            margin-left: 20%;
            margin-top: 20px;
            font-size: 30px;
        }
        header a {
            color: dimgray;
            font-size: 20px;
            font-weight: bold;
            padding: 0 25px;
            position: absolute;
            right: 20%;
            top: 5%;
        }
        main {
            background-color: #FFFFFF;
            width: 60%;
            height: 80%;
            /*position: absolute;
            left: 10%;*/
            margin: 0 auto;
        }
        aside {
            background-color: #808080;
            width: 15%;
            height: 100%;
            float: left;
        }
        .sidebar_tag {
            width: 100%;
            margin-bottom: 1%;
            position: relative;
            top: 10%;
            text-align: center;
            height: 15%;
            border: solid #000000;
            box-sizing: border-box;/*ボーダーを含んだサイズにする*/
            z-index: 0; /* 必要であればリンク要素の重なりのベース順序指定 */
        }
        .sidebar_tag a {
            display: block;
            position: relative;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: auto; /* 必要であればリンク要素の重なりのベース順序指定 */
        }
        .sidebar_tag a span{
            position: absolute;
            top: 50%; /*ここで下に50%ずらす*/
            left: 0;
            width: 100%;
            color: #000000;
            transform : translateY(-50%); /*ここで上に50%戻す*/
            z-index: auto; /* 必要であればリンク要素の重なりのベース順序指定 */
        }
        .content {
            width: 85%;
            height: 100%; 
            position: relative;
            left: 15%;
        }
        #imageBox {
            width: 40%;
            height: 40%;
            position: relative;
            left: 30%;
            top: 10%;
            border: 1px solid #000000;
        }
        #image {
            height: 100%;
            width: auto;
            position: absolute;
            top: 0;
            left: 0;
        }
        #profileBox {
            position: relative;
            top: 20%;
        }
        .profile {
            width: 80%;
            position: relative;
            left: 10%;
            margin-bottom: 3%;
        }
        .input_form {
            height: 30px;
            width: 30%;
        }
        #button {
            position: absolute;
            right: 20%;
            margin-top: 3%;
            color: red;
            text-decoration: none; 
        }
        /*
        #content-footer {
            width: 100%;
            height: 10%;
            position: relative;
            top: 20%;
        }
        */
        footer {
            height: 10%;
        }
    </style>
</head>
<body>
    <header>
        <label>{{ Session::get('user.nickname') }}のページ</label>
        <a href="/">ログアウト</a>
    </header>
    
    <main>
        <aside>
            <div class="sidebar_tag">
                <a href=""><span>基本情報</span></a>  
            </div>
            <div class="sidebar_tag">
                <a href=""><span>交換履歴</span></a>  
            </div>
            <div class="sidebar_tag">
                <a href=""><span>設定</span></a>  
            </div>
            <div class="sidebar_tag">
                <a href=""><span>その他</span></a>  
            </div>
        </aside>
        <div class="content">
            <div id="imageBox">
                <img id="image" src="https://lh3.googleusercontent.com/ogw/ADGmqu-lOHI3wILYfWgBkiQdJ9IMsRArleodzT0frAYF=s32-c-mo" />
            </div>
            <form id="profileBox" action="/user/home" method="post">
                @method('PUT')
                @csrf
                <div class="profile" hidden>
                    <input class="input_form" type="text" name="id" class="form_input" value="{{ Session::get('user.id') }}" onblur="check_email(this)" />
                </div>
                <div class="profile">
                    <label>新しいニックネーム：</label>
                    <input class="input_form" type="text" name="nickname" class="form_input" value="{{ Session::get('user.nickname') }}" onblur="check_email(this)" />
                </div>
                <div class="profile">
                    <label>新しいメールアドレス：</label>
                    <input class="input_form" type="text" name="email" class="form_input" value="{{ Session::get('user.email') }}"　onblur="check_email(this)" />
                </div>
                <div class="profile">
                    <input type="submit" id="button" value="更新する" />
                </div>
            </form>
        </div>
    <!--
    <p>ニックネーム: {{$nickname ?? ''}}</p>
    <p>email: {{$email ?? ''}}</p> 
    <p>password: {{$password ?? ''}}</p>
    -->
    </main>
    
    <footer></footer>
</body>
</html>