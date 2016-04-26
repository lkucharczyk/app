<?php
/** Japanese (日本語)
 *
 * See MessagesQqq.php for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author Akaniji
 * @author Alexsh
 * @author Aotake
 * @author Aphaia
 * @author Broad-Sky
 * @author Chatama
 * @author Chinneeb
 * @author Emk
 * @author Fievarsty
 * @author Fryed-peach
 * @author Hatukanezumi
 * @author Hijiri
 * @author Hisagi
 * @author Hosiryuhosi
 * @author Iwai.masaharu
 * @author Joe Elkins
 * @author JtFuruhata
 * @author Kahusi
 * @author Kanon und wikipedia
 * @author Kkkdc
 * @author Klutzy
 * @author Koba-chan
 * @author Likibp
 * @author Lovekhmer
 * @author Marine-Blue
 * @author Miya
 * @author Mizusumashi
 * @author Muttley
 * @author Mzm5zbC3
 * @author Ohgi
 * @author Penn Station
 * @author Reedy
 * @author Schu
 * @author Suisui
 * @author VZP10224
 * @author Vigorous action
 * @author W.CC
 * @author Web comic
 * @author Whym
 * @author Yanajin66
 * @author לערי ריינהארט
 * @author 欅
 * @author 蝋燭α
 * @author 青子守歌
 */

$datePreferences = array(
	'default',
	'nengo',
	'ISO 8601',
);

$defaultDateFormat = 'ja';

$dateFormats = array(
	'ja time'    => 'H:i',
	'ja date'    => 'Y年n月j日 (D)',
	'ja both'    => 'Y年n月j日 (D) H:i',

	'nengo time' => 'H:i',
	'nengo date' => 'xtY年n月j日 (D)',
	'nengo both' => 'xtY年n月j日 (D) H:i',
);

$namespaceNames = array(
	NS_MEDIA            => 'メディア',
	NS_SPECIAL          => '特別',
	NS_TALK             => 'トーク',
	// begin wikia change
	// VOLDEV-90
	NS_USER             => 'ユーザー',
	NS_USER_TALK        => 'ユーザー・トーク',
	// end wikia change
	NS_PROJECT_TALK     => '$1・トーク',
	NS_FILE             => 'ファイル',
	NS_FILE_TALK        => 'ファイル・トーク',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'MediaWiki・トーク',
	NS_TEMPLATE         => 'テンプレート',
	NS_TEMPLATE_TALK    => 'テンプレート・トーク',
	NS_HELP             => 'ヘルプ',
	NS_HELP_TALK        => 'ヘルプ・トーク',
	NS_CATEGORY         => 'カテゴリ',
	NS_CATEGORY_TALK    => 'カテゴリ・トーク',
);

$namespaceAliases = array(
	'ノート'			=> NS_TALK,
	// begin wikia change
	// VOLDEV-90
	'利用者'			=> NS_USER,
	'利用者・トーク'		=> NS_USER_TALK,
	// end wikia change
	'利用者‐会話'		=> NS_USER_TALK,
	'$1‐ノート'		=> NS_PROJECT_TALK,
	'画像'			=> NS_FILE,
	'画像‐ノート'		=> NS_FILE_TALK,
	'ファイル‐ノート'		=> NS_FILE_TALK,
	'MediaWiki‐ノート'	=> NS_MEDIAWIKI_TALK,
	'Template‐ノート'		=> NS_TEMPLATE_TALK,
	'Help‐ノート'		=> NS_HELP_TALK,
	'Category‐ノート'		=> NS_CATEGORY_TALK
);

$specialPageAliases = array(
	'Activeusers'               => array( '活動中の利用者', '活動中の利用者一覧' ),
	'Allmessages'               => array( 'メッセージ一覧', 'システムメッセージの一覧', '表示メッセージの一覧' ),
	'Allpages'                  => array( 'ページ一覧', '全ページ' ),
	'Ancientpages'              => array( '更新されていないページ' ),
	'Badtitle'                  => array( '不正なページ名' ),
	'Blankpage'                 => array( '白紙ページ' ),
	'Block'                     => array( '投稿ブロック', 'ブロック' ),
	'Blockme'                   => array( '自己ブロック' ),
	'Booksources'               => array( '文献資料' ),
	'BrokenRedirects'           => array( '壊れたリダイレクト', '壊れたリダイレクト' ),
	'Categories'                => array( 'カテゴリ', 'カテゴリ一覧' ),
	'ChangeEmail'               => array( 'メールアドレスの変更' ),
	'ChangePassword'            => array( 'パスワードの変更', 'パスワード変更', 'パスワード再発行', 'パスワードの再発行' ),
	'ComparePages'              => array( 'ページの比較' ),
	'Confirmemail'              => array( 'メールアドレスの確認' ),
	'Contributions'             => array( '投稿記録' ),
	'CreateAccount'             => array( 'アカウント作成', 'アカウントの作成' ),
	'Deadendpages'              => array( '有効なページへのリンクがないページ', '行き止まりページ' ),
	'DeletedContributions'      => array( '削除された投稿記録', '削除された投稿履歴', '削除歴' ),
	'Disambiguations'           => array( '曖昧さ回避のページ', '曖昧さ回避' ),
	'DoubleRedirects'           => array( '二重リダイレクト' ),
	'EditWatchlist'             => array( 'ウォッチリストの編集', 'ウォッチリスト編集' ),
	'Emailuser'                 => array( 'メール送信', 'ウィキメール' ),
	'Export'                    => array( 'データ書き出し', 'データー書き出し', 'エクスポート' ),
	'Fewestrevisions'           => array( '編集履歴の少ないページ', '版の少ない項目', '版の少ないページ' ),
	'FileDuplicateSearch'       => array( '重複ファイル検索' ),
	'Filepath'                  => array( 'パスの取得' ),
	'Import'                    => array( 'データ取り込み', 'データー取り込み', 'インポート' ),
	'Invalidateemail'           => array( 'メール無効化', 'メール無効' ),
	'BlockList'                 => array( 'ブロック一覧', 'ブロックの一覧' ),
	'LinkSearch'                => array( '外部リンク検索' ),
	'Listadmins'                => array( 'アドミン一覧' ),
	'Listbots'                  => array( 'ボット一覧', 'Bot一覧' ),
	'Listfiles'                 => array( 'ファイル一覧', 'ファイルリスト' ),
	'Listgrouprights'           => array( 'ユーザーグループ権限', 'ユーザーグループの権限一覧', 'ユーザーグループ権限一覧' ),
	'Listredirects'             => array( 'リダイレクト一覧', 'リダイレクトの一覧', 'リダイレクトリスト' ),
	'Listusers'                 => array( 'ユーザー一覧', 'ユーザーの一覧' ),
	'Lockdb'                    => array( 'データベースロック' ),
	'Log'                       => array( 'ログ', '記録' ),
	'Lonelypages'               => array( '孤立しているページ' ),
	'Longpages'                 => array( '長いページ' ),
	'MergeHistory'              => array( '履歴統合' ),
	'MIMEsearch'                => array( 'MIME検索', 'MIMEタイプ検索' ),
	'Mostcategories'            => array( 'カテゴリの多いページ', 'カテゴリの多い項目' ),
	'Mostimages'                => array( '被リンクの多いファイル', '使用箇所の多いファイル' ),
	'Mostlinked'                => array( '被リンクの多いページ' ),
	'Mostlinkedcategories'      => array( '被リンクの多いカテゴリ' ),
	'MostLinkedFilesInContent'  => array( 'コンテンツ内被リンク最多ファイル' ),
	'Mostlinkedtemplates'       => array( '使用箇所の多いテンプレート', '被リンクの多いテンプレート' ),
	'Mostrevisions'             => array( '編集履歴の多いページ', '版の多い項目', '版の多いページ' ),
	'Movepage'                  => array( '移動', 'ページの移動' ),
	'Mycontributions'           => array( '自分の投稿記録' ),
	'Mypage'                    => array( '利用者ページ', 'マイページ', 'マイ・ページ' ),
	'Mytalk'                    => array( 'トークページ', '会話ページ', 'マイトーク', 'マイ・トーク' ),
	'Myuploads'                 => array( '自分のアップロード記録' ),
	'Newimages'                 => array( '新着ファイル', '新しいファイルの一覧', '新着画像展示室' ),
	'Newpages'                  => array( '新しいページ', '新規項目' ),
	'PasswordReset'             => array( 'パスワード再設定', 'パスワードの再設定', 'パスワードのリセット', 'パスワードリセット' ),
	'PermanentLink'             => array( '固定リンク' ),
	'Popularpages'              => array( '人気ページ' ),
	'Preferences'               => array( '個人設定', 'オプション' ),
	'Prefixindex'               => array( '前方一致ページ一覧', '始点指定ページ一覧' ),
	'Protectedpages'            => array( '保護されているページ' ),
	'Protectedtitles'           => array( '作成保護されているページ名' ),
	'Randompage'                => array( 'おまかせ表示' ),
	'Randomredirect'            => array( 'おまかせリダイレクト', 'おまかせ転送' ),
	'Recentchanges'             => array( '最近の更新', '最近更新したページ' ),
	'Recentchangeslinked'       => array( '関連ページの更新状況', 'リンク先の更新状況' ),
	'Revisiondelete'            => array( '版指定削除', '特定版削除' ),
	'RevisionMove'              => array( '版移動' ),
	'Search'                    => array( '検索' ),
	'Shortpages'                => array( '短いページ' ),
	'SiteWideMessages'          => array( 'サイトワイドメッセージ' ),
	'Specialpages'              => array( '特別ページ一覧' ),
	'Statistics'                => array( '統計' ),
	'Tags'                      => array( 'タグ一覧' ),
	'Unblock'                   => array( 'ブロック解除' ),
	'Uncategorizedcategories'   => array( 'カテゴリ未導入のカテゴリ' ),
	'Uncategorizedimages'       => array( 'カテゴリ未導入のファイル' ),
	'Uncategorizedpages'        => array( 'カテゴリ未導入のページ' ),
	'Uncategorizedtemplates'    => array( 'カテゴリ未導入のテンプレート' ),
	'Undelete'                  => array( '復帰' ),
	'Unlockdb'                  => array( 'データベースロック解除', 'データベース解除' ),
	'Unusedcategories'          => array( '使われていないカテゴリ', '未使用カテゴリ' ),
	'Unusedimages'              => array( '使われていないファイル', '未使用ファイル', '未使用画像' ),
	'Unusedtemplates'           => array( '使われていないテンプレート', '未使用テンプレート' ),
	'Unwatchedpages'            => array( 'ウォッチされていないページ' ),
	'Upload'                    => array( 'アップロード' ),
	'UploadStash'               => array( '未公開アップロード' ),
	'Userlogin'                 => array( 'ログイン' ),
	'Userlogout'                => array( 'ログアウト' ),
	'Userrights'                => array( 'ユーザー権限', 'ユーザー権限の変更' ),
	'Version'                   => array( 'バージョン情報', 'バージョン' ),
	'Wantedcategories'          => array( '存在しないカテゴリへのリンク', '赤リンクカテゴリ' ),
	'Wantedfiles'               => array( '存在しないファイルへのリンク', '赤リンクファイル' ),
	'Wantedpages'               => array( '存在しないページへのリンク', '赤リンク' ),
	'Wantedtemplates'           => array( '存在しないテンプレートへのリンク', '赤リンクテンプレート' ),
	'Watchlist'                 => array( 'ウォッチリスト' ),
	'Whatlinkshere'             => array( 'リンク元' ),
	'Withoutinterwiki'          => array( '言語間リンクを持たないページ', '言語間リンクのないページ' ),
);

$magicWords = array(
	'redirect'                => array( '0', '#転送', '#リダイレクト', '＃転送', '＃リダイレクト', '#REDIRECT' ),
	'notoc'                   => array( '0', '__目次非表示__', '＿＿目次非表示＿＿', '__NOTOC__' ),
	'nogallery'               => array( '0', '__ギャラリー非表示__', '＿＿ギャラリー非表示＿＿', '__NOGALLERY__' ),
	'forcetoc'                => array( '0', '__目次強制__', '＿＿目次強制＿＿', '__FORCETOC__' ),
	'toc'                     => array( '0', '__目次__', '＿＿目次＿＿', '__TOC__' ),
	'noeditsection'           => array( '0', '__節編集非表示__', '__セクション編集非表示__', '＿＿セクション編集非表示＿＿', '__NOEDITSECTION__' ),
	'noheader'                => array( '0', '__見出し非表示__', '＿＿見出し非表示＿＿', '__NOHEADER__' ),
	'currentmonth'            => array( '1', '現在の月', '協定月', 'CURRENTMONTH', 'CURRENTMONTH2' ),
	'currentmonth1'           => array( '1', '現在の月1', '協定月1', '協定月１', 'CURRENTMONTH1' ),
	'currentmonthname'        => array( '1', '現在の月名', '協定月名', 'CURRENTMONTHNAME' ),
	'currentmonthnamegen'     => array( '1', '現在の月属格', 'CURRENTMONTHNAMEGEN' ),
	'currentmonthabbrev'      => array( '1', '現在の月省略形', '省略協定月', '協定月省略', '協定月省略形', 'CURRENTMONTHABBREV' ),
	'currentday'              => array( '1', '現在の日', '協定日', 'CURRENTDAY' ),
	'currentday2'             => array( '1', '現在の日2', '協定日2', '協定日２', 'CURRENTDAY2' ),
	'currentdayname'          => array( '1', '現在の曜日名', '協定曜日', 'CURRENTDAYNAME' ),
	'currentyear'             => array( '1', '現在の年', '協定年', 'CURRENTYEAR' ),
	'currenttime'             => array( '1', '現在の時刻', '協定時間', '協定時刻', 'CURRENTTIME' ),
	'currenthour'             => array( '1', '現在の時', '協定時', 'CURRENTHOUR' ),
	'localmonth'              => array( '1', '地方時の月', '現地月', 'LOCALMONTH', 'LOCALMONTH2' ),
	'localmonth1'             => array( '1', '地方時の月1', '現地月1', '現地月１', 'LOCALMONTH1' ),
	'localmonthname'          => array( '1', '地方時の月名1', '現地月名', 'LOCALMONTHNAME' ),
	'localmonthnamegen'       => array( '1', '地方時の月属格', 'LOCALMONTHNAMEGEN' ),
	'localmonthabbrev'        => array( '1', '地方時の月省略形', '省略現地月', 'LOCALMONTHABBREV' ),
	'localday'                => array( '1', '地方時の日', '現地日', 'ローカルデイ', 'LOCALDAY' ),
	'localday2'               => array( '1', '地方時の日2', '現地日2', '現地日２', 'LOCALDAY2' ),
	'localdayname'            => array( '1', '地方時の曜日名', '現地曜日', 'ローカルデイネーム', 'LOCALDAYNAME' ),
	'localyear'               => array( '1', '地方時の年', '現地年', 'ローカルイヤー', 'LOCALYEAR' ),
	'localtime'               => array( '1', '地方時の時刻', '現地時間', 'ローカルタイム', 'LOCALTIME' ),
	'localhour'               => array( '1', '地方時の時', '現地時', 'LOCALHOUR' ),
	'numberofpages'           => array( '1', 'ページ数', 'NUMBEROFPAGES' ),
	'numberofarticles'        => array( '1', '記事数', 'NUMBEROFARTICLES' ),
	'numberoffiles'           => array( '1', 'ファイル数', 'NUMBEROFFILES' ),
	'numberofusers'           => array( '1', '利用者数', 'NUMBEROFUSERS' ),
	'numberofactiveusers'     => array( '1', '活動利用者数', '有効な利用者数', '有効利用者数', 'NUMBEROFACTIVEUSERS' ),
	'numberofedits'           => array( '1', '編集回数', 'NUMBEROFEDITS' ),
	'numberofviews'           => array( '1', '閲覧回数', 'NUMBEROFVIEWS' ),
	'pagename'                => array( '1', 'ページ名', 'PAGENAME' ),
	'pagenamee'               => array( '1', 'ページ名E', 'ページ名Ｅ', 'PAGENAMEE' ),
	'namespace'               => array( '1', '名前空間', 'NAMESPACE' ),
	'namespacee'              => array( '1', '名前空間E', '名前空間Ｅ', 'NAMESPACEE' ),
	'talkspace'               => array( '1', 'トーク空間', 'ノート空間', '会話空間', 'トークスペース', 'TALKSPACE' ),
	'talkspacee'              => array( '1', 'トーク空間E', 'トーク空間Ｅ', 'ノート空間E', '会話空間E', 'ノート空間Ｅ', '会話空間Ｅ', 'トークスペースE', 'トークスペースＥ', 'TALKSPACEE' ),
	'subjectspace'            => array( '1', '主空間', '標準空間', '記事空間', 'SUBJECTSPACE', 'ARTICLESPACE' ),
	'subjectspacee'           => array( '1', '主空間E', '標準空間E', '標準空間Ｅ', '記事空間E', '記事空間Ｅ', 'SUBJECTSPACEE', 'ARTICLESPACEE' ),
	'fullpagename'            => array( '1', '完全なページ名', 'フルページ名', '完全な記事名', '完全記事名', 'FULLPAGENAME' ),
	'fullpagenamee'           => array( '1', '完全なページ名E', 'フルページ名E', 'フルページ名Ｅ', '完全なページ名Ｅ', 'FULLPAGENAMEE' ),
	'subpagename'             => array( '1', 'サブページ名', 'SUBPAGENAME' ),
	'subpagenamee'            => array( '1', 'サブページ名E', 'サブページ名Ｅ', 'SUBPAGENAMEE' ),
	'basepagename'            => array( '1', '親ページ名', 'BASEPAGENAME' ),
	'basepagenamee'           => array( '1', '親ページ名E', '親ページ名Ｅ', 'BASEPAGENAMEE' ),
	'talkpagename'            => array( '1', 'トークページ名', '会話ページ名', 'TALKPAGENAME' ),
	'talkpagenamee'           => array( '1', 'トークページ名E', '会話ページ名E', '会話ページ名Ｅ', 'トークページ名Ｅ', 'TALKPAGENAMEE' ),
	'subjectpagename'         => array( '1', '主ページ名', '記事ページ名', 'SUBJECTPAGENAME', 'ARTICLEPAGENAME' ),
	'subjectpagenamee'        => array( '1', '主ページ名E', '記事ページ名E', '主ページ名Ｅ', '記事ページ名Ｅ', 'SUBJECTPAGENAMEE', 'ARTICLEPAGENAMEE' ),
	'msg'                     => array( '0', 'メッセージ:', 'MSG:' ),
	'subst'                   => array( '0', '展開:', '展開：', 'SUBST:' ),
	'safesubst'               => array( '0', '安全展開:', 'SAFESUBST:' ),
	'msgnw'                   => array( '0', 'ウィキ無効メッセージ:', 'MSGNW:' ),
	'img_thumbnail'           => array( '1', 'サムネイル', 'thumbnail', 'thumb' ),
	'img_manualthumb'         => array( '1', '代替画像=$1', 'サムネイル=$1', 'thumbnail=$1', 'thumb=$1' ),
	'img_right'               => array( '1', '右', 'right' ),
	'img_left'                => array( '1', '左', 'left' ),
	'img_none'                => array( '1', 'なし', '無し', 'none' ),
	'img_width'               => array( '1', '$1ピクセル', '$1px' ),
	'img_center'              => array( '1', '中央', 'center', 'centre' ),
	'img_framed'              => array( '1', 'フレーム', 'framed', 'enframed', 'frame' ),
	'img_frameless'           => array( '1', 'フレームなし', 'frameless' ),
	'img_page'                => array( '1', 'ページ=$1', 'ページ $1', 'page=$1', 'page $1' ),
	'img_upright'             => array( '1', '右上', 'upright', 'upright=$1', 'upright $1' ),
	'img_border'              => array( '1', '境界', 'ボーダー', 'border' ),
	'img_baseline'            => array( '1', '下線', 'ベースライン', 'baseline' ),
	'img_sub'                 => array( '1', '下付き', 'sub' ),
	'img_super'               => array( '1', '上付き', 'super', 'sup' ),
	'img_top'                 => array( '1', '上端', 'top' ),
	'img_text_top'            => array( '1', '文上端', 'text-top' ),
	'img_middle'              => array( '1', '中心', 'middle' ),
	'img_bottom'              => array( '1', '下端', 'bottom' ),
	'img_text_bottom'         => array( '1', '文下端', 'text-bottom' ),
	'img_link'                => array( '1', 'リンク=$1', 'link=$1' ),
	'img_alt'                 => array( '1', '代替文=$1', 'alt=$1' ),
	'int'                     => array( '0', 'インターフェース:', 'インタ:', 'インターフェース：', 'インタ：', 'INT:' ),
	'sitename'                => array( '1', 'サイト名', 'サイトネーム', 'SITENAME' ),
	'ns'                      => array( '0', '名前空間:', '名前空間：', '名空:', '名空：', 'NS:' ),
	'nse'                     => array( '0', '名前空間E:', 'NSE:' ),
	'localurl'                => array( '0', 'ローカルURL:', 'ローカルＵＲＬ：', 'LOCALURL:' ),
	'localurle'               => array( '0', 'ローカルURLE:', 'ローカルＵＲＬＥ：', 'LOCALURLE:' ),
	'articlepath'             => array( '0', '記事パス', 'ARTICLEPATH' ),
	'server'                  => array( '0', 'サーバー', 'サーバ', 'SERVER' ),
	'servername'              => array( '0', 'サーバー名', 'サーバーネーム', 'サーバ名', 'サーバネーム', 'SERVERNAME' ),
	'scriptpath'              => array( '0', 'スクリプトパス', 'SCRIPTPATH' ),
	'stylepath'               => array( '0', 'スタイルパス', 'STYLEPATH' ),
	'grammar'                 => array( '0', '文法:', 'GRAMMAR:' ),
	'gender'                  => array( '0', '性別:', '性別：', 'GENDER:' ),
	'notitleconvert'          => array( '0', '__タイトル変換無効__', '__タイトルコンバート拒否__', '＿＿タイトルコンバート拒否＿＿', '__タイトル非表示__', '__NOTITLECONVERT__', '__NOTC__' ),
	'nocontentconvert'        => array( '0', '__内容変換無効__', '__内容変換抑制__', '＿＿内容変換抑制＿＿', '__NOCONTENTCONVERT__', '__NOCC__' ),
	'currentweek'             => array( '1', '現在の週', 'CURRENTWEEK' ),
	'currentdow'              => array( '1', '現在の曜日番号', 'CURRENTDOW' ),
	'localweek'               => array( '1', '地方時の週', '現地週', 'ローカルウィーク', 'LOCALWEEK' ),
	'localdow'                => array( '1', '地方時の曜日番号', 'LOCALDOW' ),
	'revisionid'              => array( '1', '版のID', 'リビジョンID', '差分ID', 'リビジョンＩＤ', '差分ＩＤ', 'REVISIONID' ),
	'revisionday'             => array( '1', '版の日', 'リビジョン日', '差分日', 'REVISIONDAY' ),
	'revisionday2'            => array( '1', '版の日2', 'リビジョン日2', '差分日2', 'リビジョン日２', '差分日２', 'REVISIONDAY2' ),
	'revisionmonth'           => array( '1', '版の月', 'リビジョン月', '差分月', 'REVISIONMONTH' ),
	'revisionmonth1'          => array( '1', '版の月1', 'REVISIONMONTH1' ),
	'revisionyear'            => array( '1', '版の年', 'リビジョン年', '差分年', 'REVISIONYEAR' ),
	'revisiontimestamp'       => array( '1', '版のタイムスタンプ', 'リビジョンタイムスタンプ', 'REVISIONTIMESTAMP' ),
	'revisionuser'            => array( '1', '版の利用者', 'リビジョンユーザー', 'リビジョンユーザ', 'リビジョン利用者', '差分利用者', 'REVISIONUSER' ),
	'plural'                  => array( '0', '複数:', '複数：', 'PLURAL:' ),
	'fullurl'                 => array( '0', '完全なURL:', 'フルURL:', '完全なＵＲＬ：', 'フルＵＲＬ：', 'FULLURL:' ),
	'fullurle'                => array( '0', '完全なURLE:', 'フルURLE:', '完全なＵＲＬＥ：', 'フルＵＲＬＥ：', 'FULLURLE:' ),
	'lcfirst'                 => array( '0', '先頭小文字:', 'LCFIRST:' ),
	'ucfirst'                 => array( '0', '先頭大文字:', 'UCFIRST:' ),
	'lc'                      => array( '0', '小文字:', 'LC:' ),
	'uc'                      => array( '0', '大文字:', 'UC:' ),
	'raw'                     => array( '0', '生:', 'RAW:' ),
	'displaytitle'            => array( '1', '表示タイトル:', 'DISPLAYTITLE' ),
	'rawsuffix'               => array( '1', '生', 'R' ),
	'newsectionlink'          => array( '1', '__新しい節リンク__', '__新しいセクションリンク__', '__新セクションリンク__', '＿＿新しいセクションリンク＿＿', '＿＿新セクションリンク＿＿', '__NEWSECTIONLINK__' ),
	'nonewsectionlink'        => array( '1', '__新しい節リンク非表示__', '__新しいセクションリンク非表示__', '＿＿新しいセクションリンク非表示＿＿', '__新セクションリンク非表示__', '＿＿新セクションリンク非表示＿＿', '__NONEWSECTIONLINK__' ),
	'currentversion'          => array( '1', '現在のバージョン', 'ウィキバージョン', 'MediaWikiバージョン', 'メディアウィキバージョン', 'CURRENTVERSION' ),
	'urlencode'               => array( '0', 'URLエンコード:', 'ＵＲＬエンコード：', 'URLENCODE:' ),
	'anchorencode'            => array( '0', 'アンカー用エンコード', 'ANCHORENCODE' ),
	'currenttimestamp'        => array( '1', '現在のタイムスタンプ', '協定タイムスタンプ', 'CURRENTTIMESTAMP' ),
	'localtimestamp'          => array( '1', '地方時のタイムスタンプ', '現地タイムスタンプ', 'ローカルタイムスタンプ', 'LOCALTIMESTAMP' ),
	'directionmark'           => array( '1', '方向印', 'DIRECTIONMARK', 'DIRMARK' ),
	'language'                => array( '0', '#言語:', '＃言語：', '#LANGUAGE:' ),
	'contentlanguage'         => array( '1', '内容言語', '記事言語', 'プロジェクト言語', 'CONTENTLANGUAGE', 'CONTENTLANG' ),
	'pagesinnamespace'        => array( '1', '名前空間内ページ数', 'PAGESINNAMESPACE:', 'PAGESINNS:' ),
	'numberofadmins'          => array( '1', '管理者数', 'NUMBEROFADMINS' ),
	'formatnum'               => array( '0', '数整形', 'FORMATNUM' ),
	'padleft'                 => array( '0', '補充左', 'PADLEFT' ),
	'padright'                => array( '0', '補充右', 'PADRIGHT' ),
	'special'                 => array( '0', '特別', 'special' ),
	'defaultsort'             => array( '1', 'デフォルトソート:', 'デフォルトソート：', 'デフォルトソートキー:', 'デフォルトカテゴリソート:', 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ),
	'filepath'                => array( '0', 'ファイルパス:', 'ファイルパス：', 'FILEPATH:' ),
	'tag'                     => array( '0', 'タグ', 'tag' ),
	'hiddencat'               => array( '1', '__カテゴリ非表示__', '__カテ非表示__', '__非表示カテ__', '__HIDDENCAT__' ),
	'pagesincategory'         => array( '1', 'カテゴリ内ページ数', 'PAGESINCATEGORY', 'PAGESINCAT' ),
	'pagesize'                => array( '1', 'ページサイズ', 'PAGESIZE' ),
	'index'                   => array( '1', '__インデックス__', '＿＿インデックス＿＿', '__INDEX__' ),
	'noindex'                 => array( '1', '__インデックス拒否__', '＿＿インデックス拒否＿＿', '__NOINDEX__' ),
	'numberingroup'           => array( '1', 'グループ人数', 'グループ所属人数', 'NUMBERINGROUP', 'NUMINGROUP' ),
	'staticredirect'          => array( '1', '__静的転送__', '__二重転送解消無効__', '＿＿二重転送解消無効＿＿', '__二重転送修正無効__', '＿＿二重転送修正無効＿＿', '__STATICREDIRECT__' ),
	'protectionlevel'         => array( '1', '保護レベル', 'PROTECTIONLEVEL' ),
	'formatdate'              => array( '0', '日付整形', 'formatdate', 'dateformat' ),
	'url_path'                => array( '0', 'パス', 'PATH' ),
	'url_wiki'                => array( '0', 'ウィキ', 'WIKI' ),
	'url_query'               => array( '0', 'クエリー', 'QUERY' ),
);
