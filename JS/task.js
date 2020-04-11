document.addEventListener('DOMContentLoaded',function(){
  function addAndRemove(answer,task){
    //テキストボックスの値を取得
    var answer = document.getElementById(answer);
    var value = answer.value;
    if(value ===""){
      //処理なし
    }else{
      //テキストノードを生成
      var text = document.createTextNode(answer.value);
      //<li>要素を生成
      var list = document.createElement('li');
      //テキストノードを<li>要素に追加
      list.appendChild(text);
      //テキストボックスの中身をリセット
      answer.value="";
      //<span class="far fa-trash-alt">を生成
      var span = document.createElement('span');
      var addclass = document.createAttribute('class');
      addclass.value="far fa-trash-alt";
      span.setAttributeNode(addclass);
      list.appendChild(span);
      //<div id="task">を取得
      var task = document.getElementById(task);
      //<div>要素の直下に<li>/<i>要素の順番で追加
      task.appendChild(list);

      //<span>要素をクリックしたらテキストが削除される処理
      span.addEventListener('click',function(){
      task.removeChild(list);
      },false);
    }
  }
  //tbOfTargetにaddAndRemove関数を実装
  document.getElementById('btnOfTarget').addEventListener('click',function(){
    addAndRemove('answerOfTarget','taskOfTarget');
  },false);
  //tbOfImportantにaddAndRemove関数を実装
  document.getElementById('btnOfImportant').addEventListener('click',function(){
    addAndRemove('answerOfImportant','taskOfImportant');
  },false);
  //tbOfImazingにaddAndRemove関数を実装
  document.getElementById('btnOfImazing').addEventListener('click',function(){
    addAndRemove('answerOfImazing','taskOfImazing');
  },false);
  //tbOfReverceにaddAndRemove関数を実装
  document.getElementById('btnOfReverce').addEventListener('click',function(){
    addAndRemove('answerOfReverce','taskOfReverce');
  },false);
  //tbOfSettingにaddAndRemove関数を実装
  document.getElementById('btnOfSetting').addEventListener('click',function(){
    addAndRemove('answerOfSetting','taskOfSetting');
  },false);
  //tbOfChoiceにaddAndRemove関数を実装
  document.getElementById('btnOfChoice').addEventListener('click',function(){
    addAndRemove('answerOfChoice','taskOfChoice');
  },false);
  //tbOfContrastにaddAndRemove関数を実装
  document.getElementById('btnOfContrast').addEventListener('click',function(){
    addAndRemove('answerOfContrast','taskOfContrast');
  },false);
  //tbOfFixにaddAndRemove関数を実装
  document.getElementById('btnOfFix').addEventListener('click',function(){
    addAndRemove('answerOfFix','taskOfFix');
  },false);
  //tbOfQuestionにaddAndRemove関数を実装
  document.getElementById('btnOfQuestion').addEventListener('click',function(){
    addAndRemove('answerOfQuestion','taskOfQuestion');
  },false);
  //tbOfRealにaddAndRemove関数を実装
  document.getElementById('btnOfReal').addEventListener('click',function(){
    addAndRemove('answerOfReal','taskOfReal');
  },false);
  //ここから完成ボタンの機能
  var complete = document.getElementById('complete')
  //<input>要素を取得
  var input = document.getElementsByTagName('input');
  //<textarea>要素を取得
  var textarea= document.getElementsByTagName('textarea');
  //<br>要素を取得
  var br = document.getElementsByTagName('br');
  //追加された<li>要素を取得
  var li = document.getElementsByTagName('li');
  //追加された<span>要素を取得
  var span = document.getElementsByTagName('span');
  complete.addEventListener('click',function(){
    //すべての<input要素>をdisplay:noneに
    for(var i = 0,len1 = input.length;i < len1; i++){
      input[i].classList.toggle('complete');
    }
    //すべての<textarea>要素をdisplay:noneに
    for(var x = 0,len2 = textarea.length;x < len2;x++){
      textarea[x].classList.toggle('complete');
    }
    //すべての<br>要素をdisplay:noneに
    for(var y = 0,len3 = br.length;y < len3; y++){
      br[y].classList.toggle('complete');
    }
    //すべての<span>要素を<li要素>から削除
    for(var z = r = 0,len4 = li.length;z < len4; z++){
      li[z].removeChild(span[r]);
    }
  },false);
},false);
