<?php
  require_once(__DIR__.'/config/config.php');

  function h($s){ //XSS対策
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

  session_start();
  //ログインしているかを判定
  if(isset($_SESSION['EMAIL'])){
    //ログインしていた場合の処理
    $welcome ='ようこそ'. h($_SESSION['EMAIL']). 'さん';
    $logout = 'ログアウトは<a href="/php/Logout.php">こちら</a>';
  }else{
    header('Location:' . SITE_URL. '/login.php');
    exit;
  }
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>タスク管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/stylesOfindex.css">
    <link rel="stylesheet" href="/CSS/responsive.css">
    <script type="text/javascript" src="./JS/task.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">
  </head>
  <body>
    <main>
      <div class="container">
        <p><?php echo $welcome ?></p>
        <p><?php echo $logout ?></p>
        <div class="title">
          <h1>タスク管理アプリ</h1>
        </div>
        <table border="1" style="border-collapse: collapse" class="tableOfBase">
            <caption>報酬感覚プランニング　基本設定</caption>
            <tbody id="tbOfTarget">
              <tr>
                <th class="heightType1">1.ターゲット</th>
                <td>
                  <p>(Q.どうしても集中力が続かない作業の中から、自分にとって最も重要なものを選んで書き込んでください)</p>
                  <input type="text" id="answerOfTarget" placeholder="例文：「企画書の作成」、「もっと運動する」など" size="80" class="textbox">
                  <input type="button" id="btnOfTarget" value="追加"><br>
                  <div id="taskOfTarget">
                  </div>
                </td>
              </tr>
            </tbody>
            <tbody id="tbOfImportant">
              <tr>
                <th class="heightType1">2.重要度チェック</th>
                <td>
                  <p>(Q.上記の目標を達成しなければならない理由のうち、最も大事なものを一つだけ選んで書き込んでください)</p>
                  <input type="text" id="answerOfImportant" placeholder="例（Q1を「企画書の作成」とした場合）：「会社に貢献する」、「社内の評価を上げる」など" size="80" class="textbox">
                  <input type="button" id="btnOfImportant" value="追加"><br>
                  <div id="taskOfImportant"></div>
                </td>
              </tr>
            </tbody>
            <tbody id="tbOfImazing">
              <tr>
                <th class="heightType1">3.具象イメージング</th>
                <td>
                  <p>(Q,1で選んだ目標を、より具体的に、頭の中で映像を浮かべやすい内容に変えてください)</p>
                  <input type="text" id="answerOfImazing" placeholder="例：目標「企画書を作成する」→変換「企画書を上司に提出してホッと一息ついたところで映画でも見に行く」" size="100" class="textbox">
                  <input type="button" id="btnOfImazing" value="追加"><br>
                  <div id="taskOfImazing"></div>
                </td>
              </tr>
            </tbody>
            <tbody id="tbOfReverce">
              <tr>
                <th class="heightType2">4.リバースプランング</th>
                <td>
                  <p>(Q.1で選んだ目標を「達成した未来」から現在にさかのぼる形で、いくつかの短期目標を決めてください)</p>
                  <textarea id="answerOfReverce" placeholder="例:目標イメージ「企画書を上司に出してスッキリ」　リバースプランニング「企画書を出す1日前に文章の見直し」→「3日前までに文章の作成をする」→「5日前までに解決策の発案をする」→「7日前までにリサーチを終える」" rows="3" cols="80" class="textbox"></textarea>
                  <input type="button" id="btnOfReverce" value="追加"><br>
                  <div id="taskOfReverce"></div>
                </td>
              </tr>
            </tbody>
            <tbody id="tbOfSetting">
              <tr>
                <th class="heightType3">5.デイリータスク設定</th>
                <td>
                  <p>(Q.4で決めた短期目標の中から、もっとも締め切りに近いものを選び、それを実現するために毎日やるべきタスクをいくつか考えてください)</p>
                  <textarea id="answerOfSetting" placeholder="例：サブゴール「7日前までにリサーチと分析を終える」&#010;デイリータスク「くわしそうな人に話を聞く」「文献サイトから必要な資料を集める」「集めた資料を読み込む」など" rows="3" cols="80" class="textbox"></textarea>
                  <input type="button" id="btnOfSetting" value="追加"><br>
                  <div id="taskOfSetting"></div>
                </td>
              </tr>
            </tbody>
        </table>
        <table border="1" style="border-collapse: collapse" class="tableOfPractice">
          <caption>報酬感覚プランニング　実践設定</caption>
          <tbody  id="tbOfChoice">
            <tr>
              <th class="heightType4">1.デイリータスク選択</th>
              <td>
                <p>(Q.基本設定ワークシートで考えたデイリータスクのなかから、「その日のうちに手をつけなければならないもの」や、「最長でも2～3時間で終わりそうなもの」だけに的を絞り、3つ～5つほどでピックアップしてください)</p>
                <input type="text" id="answerOfChoice" value="" size="80" class="textbox">
                <input type="button" id="btnOfChoice" value="追加"><br>
                <div id="taskOfChoice"></div>
              </td>
            </tr>
          </tbody>
          <tbody  id="tbOfContrast">
            <tr>
              <th class="heightType1">2.障害コントラスト</th>
              <td>
                <p>(Q.上記のデイリータスクを達成する際に、発生しそうなトラブルを書き出してください)</p>
                <input type="text" id="answerOfContrast" placeholder="例：「スマホの通知で気がそれる」、「とにかくやる気がでない」など" size="80" class="textbox">
                <input type="button" id="btnOfContrast" value="追加"><br>
                <div id="taskOfContrast"></div>
              </td>
            </tr>
          </tbody>
          <tbody  id="tbOfFix">
            <tr>
              <th class="heightType5">3.障害フィックス</th>
              <td>
                <p>(Q.2で書き出したトラブルに対して、あなたが取れそうな対策を書き込みましょう)</p>
                <textarea id="answerOfFix" placeholder="例：障害「スマホの通知で気がそれる」→対策「スマホの通知をすべて切る」&#010;障害「とにかくやる気がでない」→対策「とりあえず5分間だけ作業してみる」など" rows="2" cols="80" class="textbox"></textarea>
                <input type="button" id="btnOfFix" value="追加"><br>
                <div id="taskOfFix"></div>
              </td>
            </tr>
          </tbody>
          <tbody  id="tbOfQuestion">
            <tr>
              <th class="heightType3">4.質問型アクション</th>
              <td>
                <p>(Q.1で選んだデイリータスクについて、それぞれ次のフォーマットに変換してください)</p>
                <p>[自分の名前]は、[時間]に[場所]で[デイリータスク]をするか？</p>
                <textarea id="answerOfQuestion" placeholder="例：デイリータスク「企画書の文章の見直しをする」&#010;質問型アクション「山田太郎は、午前9時に会社の自分の席で企画書の見直しをするか？」など" rows="3" cols="80" class="textbox"></textarea>
                <input type="button" id="btnOfQuestion" value="追加"><br>
                <div id="taskOfQuestion"></div>
              </td>
            </tr>
          </tbody>
          <tbody  id="tbOfReal">
            <tr>
              <th class="heightType6">5.現実イメージング</th>
              <td>
                <p>(Q.4の質問型アクションお達成するまでのプロセスを、できるだけリアルに頭のなかに思い描いてください)</p>
                <textarea id="answerOfReal" placeholder="例：質問型アクション「山田太郎は、午前9時に会社の自分の席で企画書の見直しをするか？」&#010;現実イメージング「必要な資料のファイルをひとつのフォルダにまとめる自分」→「いつものディタを起動してフォーマットを開く自分」→「まずはさっと概要を読み流す自分」→「文章を修正する自分」" rows="5" cols="80" class="textbox"></textarea>
                <input type="button" id="btnOfReal" value="追加"><br>
                <div id="taskOfReal"></div>
              </td>
            </tr>
          </tbody>
          <tbody  id="tbOf
Reminder">
            <tr>
              <th class="heightType7">6.固定式ビジュアルリマインダー</th>
              <td>
                <p>４の質問型アクションを思い出させるものを、目に見える場所に置きましょう。</p>
                <p>(スクリーンショット、スマホのリマインダーアプリ、手帳に記入など)</p>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="btn">
          <input type="button" id="complete" value="完成">
        </div>
      </div>
    </main>
  </body>
</html>
