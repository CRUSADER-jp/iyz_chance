<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>チャンスカード引いたりするところ</title>
	<link href="./bootstrap.min.css" rel="stylesheet">
</head>
<body>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<div class="container">
<div class="page-header">
<h1>チャンスっつたらチャンスなんだよ！！！！！１</h1>
</div>
<?php
$chance_message = array(
	"1：独占禁止法違反の容疑で告発される。容疑を逃れるため、すべての独占しているエリアで、都市を最低1つづつ銀行に売らなければならない。",
	"2：CPUのエラッタが発覚。この後5ターンを終えるまでの間、自分が所有するサーバおよびラックは無いものとして扱われる。",
	"3：電源ユニットのリコールが発生。自分が所有するサーバ1台に付き100N、ラック1台に付き500Nを銀行に支払う。",
	"4：回線トラブルによるサービスダウンが発生。損害賠償として他のプレイヤーに、自分が所有するサーバの台数×10N(ラックはサーバ5台として換算)ずつを支払う。ただし、自分がサーバもラックも所有していない場合は、何も起こらない。",
	"5：オペミスによるサービスダウンが発生。損害賠償として他のプレイヤーに、自分が所有するサーバの台数×5N(ラックはサーバ5台として換算)づつを支払う。ただし、自分がサーバもラックも所有していない場合は、保険金として1000Nを銀行から受け取る。",
	"6：データセンター空調工事時のミスにより、収容するサーバで障害が発生。損害賠償として、自分が所有するラックの台数×別のプレイヤーが所有するサーバの台数×10Nをそれぞれ他のプレイヤーに支払う。自分がラックを所有していない場合は何も起こらず、サーバを所有しないプレイヤーに対しては支払いが発生しない。",
	"7：…特に何も起こらない！",
	"8：このカードが出たら、ワンドリンクをオーダーする(リアルで！",
	"9：気のせいだった。",
	"10：すべてのプレイヤーに、銀行から500Nが支払われる。",
	"11：10－自分の所有する都市の数(抵当に入っている物も含む)×50Nを銀行から受け取る。もしマイナスになる場合は、マイナス額を銀行に支払う。",
	"12：竹藪から一億円が！　臨時収入として1000Nを銀行から受け取る。",
	"13：サーバを提供しているブラウザゲームが大ヒット。サーバ増設対応に追われて、5ターン目終了までの間移動できず交渉も出来ないが、増設対応費用として5ターン目終了時に2000Nを銀行から受け取る。",
	"14：サーバを提供しているブラウザゲームが、サービスイン直後に障害により長期サービス停止に追い込まれる。見込んでいた売り上げが入ってこなかった。損失を埋めるために、所有する都市のどれか一つを銀行に売らなければいけない。",
	"15：昔好きだったあのアーティストが10年ぶりにライブを開催。興奮して一番良い席を購入。銀行に50N支払う。",
	"16：今日は某ミッドタウンでちょっと贅沢な昼食を。銀行に100N支払う。",
	"17：新しいスマートフォンを買ったのでメモリーカードも新しく。銀行に15Nを支払う。",
	"18：親戚が急病に。実家に急いで戻るため、定価で飛行機のチケットを買う羽目に。銀行に250N支払う。",
	"19：ねんがんの DURA-ACEコンポ カーボンフレームロード をかったぞ！　銀行に300N支払う。",
	"20：OSのサポート終了に伴い、新しいOSを購入。銀行に200N支払う。",
	"21：法人税の申告ミスが発覚。追徴課税分として、銀行に300N支払う。",
	"22：取引先との付き合いで増資を引き受ける。サイコロを振り、出た目×10を銀行に支払う。",
	"23：取引先との付き合いで増資を引き受けた会社が臨時配当を実施。サイコロを振り、出た目×50を銀行から受け取る。",
	"24：はまっている某ゲームで、イベントのためにアイテム課金を大量に購入。銀行に100Nを支払う。",
	"25：有明夏の陣に出陣。大量に薄い本を買い込む。銀行に200Nを支払う。",
	"26：oops！ パソコンのHDDがクラッシュ！代わりのHDDを購入する。銀行に50N支払う。",
	"27：急にお腹がいたたたた……！　医療費として、銀行に100N支払う。",
	"28：スマートフォン用のSIMをMVNOの安いやつにしてお金を浮かせる。銀行から50Nを受け取る。",
	"29：財布を拾った！　結局持ち主は現れず、中身は丸儲け。銀行から100Nを受け取る。",
	"30：減価償却済みの機器を売ったら意外にいいお値段に。銀行から200Nを受け取る。",
	"31：昔何の気なしにフリマで買ったあの絵が、まさかあの有名画家の絵だったとは。銀行から500Nを受け取る。",
	"32：運試しに買ったスクラッチくじがまさかの大当たり。銀行から200Nを受け取る。",
	"33：旅行で泊まるホテルを健保組合所有の物にしたら旅行費用が安上がりに。次のターンはサイコロを振れなくなるが、銀行から50N受け取る。",
	"34：今話題のUberで快適な移動を。もう1回サイコロを振れるが、銀行に100N支払わなければならない。なお、100Nが支払えない場合はサイコロは振れない(わざと支払わない、というのは不可)。",
	"35：終電を逃してしまい、白タクで帰宅する羽目に。GOまで進み200N受け取るが、サイコロの出た目×10Nを銀行に支払う。",
	"36：終電を逃してしまい、ネカフェで一泊。銀行に10N支払い、なおかつ次のターンはサイコロを振れない。",
	"37：終電を逃してしまうも、同じ境遇の女性としっぽりホテルで一泊。ええい爆発しろ！(何も起きません",
	"38：ぎりぎり終電に間に合った！　明日は休みだし、家の近くのコンビニでお酒でも買って帰ろう。銀行に5N支払う。",
	"39：終電に間に合うも、よいしょと座った座席にはお好み焼きが……。クリーニング費用として、銀行に20N支払う。",
	"40：回線費用を交渉して下げさせることに成功。銀行から100Nを受け取る。",
	"41：医療保険の満期返戻金を受け取る。自分の年齢×15Nを銀行から受け取る。",
	"42：田舎で行われる友人の結婚式に出席。ご祝儀は出したけど、往復の飛行機代は出たので、タダで帰省できたと思えばまぁいいか。プラマイゼロで何も起こらない。",
	"43：田舎で行われる友人の結婚式に出席。車代は出ないわ料理はしょぼいわ新婦側の女はブスばかりだわでどういうことなの！！！！１１　銀行に50N支払う。",
	"44：親戚の葬儀に参列。往復の飛行機代に香典にと思わぬ出費が。銀行に50N支払う。",
	"45：サーバを新しくして応答性能向上、ユーザの満足度が上がってPVも上がり、広告収入も増加。銀行から200N受け取る。",
	"46：新サービスが早速ネットで話題になり、あっという間に1万ユーザーを獲得。銀行から300Nを受け取る。",
	"47：新しくリリースしたアプリがGoogle Playでランキングトップに！　銀行から300Nを受け取る。",
	"48：新しくリリースしようとしたアプリがApple様の謎審査でRejectを食らいリリース延期。銀行に100Nを支払う。",
	"49：所有する土地が新空港の用地として収用されることに……。今所有している土地の内、一番価格が安い土地を、銀行に購入価格の5倍で売却する。なお、土地を一つも持っていない場合は何も起こらない。",
	"50：公正取引委員会から、独占禁止法に基づく排除措置命令を受けてしまった。独占しているエリアの土地にあるサーバおよびラックはすべて没収される(代わりのお金は入ってこない)。",
	"51：使用しているスイッチに、某国のバックドアが仕掛けられていることが判明。スイッチのリプレースを実施。所有する土地の数×20Nを銀行に支払う。",
	"52：自社のネットワークが長期にわたり侵入を受けており、大量の情報漏洩が起こっていたことが判明。所有する土地の二乗×10Nを銀行に支払う。",
	"53：政府とのタイアップ企画を受注することに成功！ボロいぜ。銀行から1000Nを受け取る。",
	"54：拠点間の回線をつなぐ機器をリプレースし、通信速度が圧倒的に早くなり、業務効率が向上。所有する土地の二乗×10Nを銀行から受け取る。",
	"55：F1チームのスポンサーになる。が、なんとそのチームがコンストラクターズチャンピオンに。広告効果でこちらもウハウハ。銀行から1500Nを受け取る。",
	"56：ロシアの鉱物資源開発プロジェクトに投資。が、その翌月にあんな事に……。300Nを銀行に支払う。",
	"57：有明冬の陣へ企業ブースを出展。「え、あの会社が？！」という感じでとりあえず宣伝にはなった。銀行から200Nを受け取る。",
	"58：投資していた会社が株式交換でGoogleに買収される。普通に現金で買収されるよりラッキーだったかも？　銀行から500Nを受け取る。",
	"59：年度末の予算消化のためにサーバを購入しよう！　どこでもいいのでサーバを1台購入する。購入できるだけの現金がない場合は、何もしない。",
	"60：今年度は赤字にしておかないと税金がやばめ、ということで大量に安めのサーバを買って減価償却費用を即時償却。銀行に200Nを支払うが、200N以下のサーバを1台無料で設置できる。",
	"61：札幌へ行く。",
	"62：小倉へ行く。",
	"63：前橋へ行く。",
	"64：町田へ行く。",
	"65：豊洲へ行く。",
	"66：お台場へ行く。",
	"67：大手町へ行く。",
	"68：デスマーチマスへ行き、見学する(だけ)。",
	"69：デスマーチマスへ行き、見学する。誰かがデスマーチ中だったら、優しい言葉をかけてあげましょう。",
	"70：デスマーチマスへ行き、見学する。ついでに、今までで一番キツいと思った仕事のデスマ体験を簡潔に述べてみましょう。",
	"71：デスマーチマスへ行き、見学しつつ、「ああ、自分はあんな目に遭わずに済んでよかった」と感謝しましょう。",
	"72：デスマーチ突入！",
	"73：デスマーチ突入！！",
	"74：デスマーチ突入！！！",
	"75：デスマーチ突入！！！！",
	"76：デスマーチ突入！！！！！",
	"77：デスマーチ突入！！！！！！",
	"78：デスマーチ突入！！！！！！！",
	"79：デスマーチ突入！！！！！！！！",
	"80：メイド喫茶に行く。",
	"81：メイド喫茶に行く。ついでに、今までのメイド喫茶経験の数を述べること。",
	"82：もう1枚カードを引く。",
	"83：もう1枚カードを引く。",
	"84：もう1枚カードを引く。",
	"85：もう1枚カードを引く。",
	"86：もう1枚カードを引く。",
	"87：もう1枚カードを引く。",
	"88：もう1枚カードを引く。",
	"89：もう1枚カードを引く。",
	"90：もう1枚カードを引く。",
	"91：最近納入されたサーバに搭載されたメモリが外れロットだったことが判明。交換費用として、所有するサーバの台数×25N(ラックはサーバ5台と換算)を銀行に支払う。",
	"92：パケットロスの原因を調べたところ、最近使っていたLANケーブルが原因と判明し総交換する羽目に。所有するサーバの台数の二乗×10N(ラックはサーバ5台と換算)を銀行に支払う。",
	"93：サーバーを預けていたデータセンターが突然の倒産！　所有するサーバおよびラックをすべて売却しなければいけない。",
	"94：地震発生！　所有する土地も甚大な被害を受けた。所有する土地の1/4(端数切り上げ)に相当する数の土地を、土地の価格が高い順に銀行に売却しなければならない。",
);

if(isset($_GET['debug']))
{
	print("<p>カード一覧</p>\n");
	print("<ul>\n");
	foreach($chance_message as $message)
	{
		print("<li>$message</li>\n");
	}
	print("</ul");

}
else
{
	print('<p>'.$chance_message[array_rand($chance_message)]."</p>\n");
	print('<p>引いた時刻：'.strftime("%Y/%m/%d %H:%M:%S")."</p>\n");

	$fp_lock = fopen("./count.lock","w");
	if(flock($fp_lock,LOCK_EX))
	{
		$fp = fopen("./count.dat","r");
		$count = fgets($fp);
		fclose($fp);

		$count+=1;

		$fp = fopen("./count.dat","w");
		fwrite($fp,$count);
		fclose($fp);

		print('<p><span class="badge">'.$count."</span>回目のカードドローです。</p>\n");
		print('<form method="GET"><input class="btn btn-default" type="submit" value="もう1回引く"></form>');
	}
	flock($fp_lock,LOCK_UN);
}
?>
</div>
</body>
</html>
