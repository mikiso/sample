2.php

/**
(2) キャンペーンバナーを扱うための Banner クラスと、キャンペーンバナーの表示可否を判定するメソッ
ドを実装してください。また、そのクラスに対するテストコードも実装してください。
＜要件＞
・バナーの表示可否は次のように判断します
a) 表示期間中のとき、バナーを表示できる
b) バナーの表示開始日時前でも、端末が特定の IP（許可 IP）のときはバナーを表示できる
c) それ以外のときは、バナーを表示できない
・バナーの表示期間はキャンペーンによって異なるため、Banner インスタンスに対して設定できるように
してください
・バナーの表示期間は、開始日時と終了日時がそれぞれ ISO8601 形式の文字列で渡されます（例：表示開始
日時「2014-08-10T12:00:00+0900」、表示終了日時「2014-08-13T15:00:00+0900」）
・許可 IP は、10.0.0.1 と 10.0.0.2 とします
*/

class BannerTest extends PHPUnit_Framework_TestCase
{
	public function 表示期間中にバナーを表示できる()
	{

	}
}

class Banner 
{
	public $startTime;
	public $endTime;

	private $allowedIPs = {"10.0.0.1", "10.0.0.2"};

	public function setStartTime($arg)
	{
		$startTime = $arg;
	}

	public function setEndTime($arg)
	{
		$endTime = $arg;
	}

	public function canDisplay()
	{
		// TODO
		$clientIP = getenv('REMOTE_ADDR');
		if (in_array($clientIP, $allowedIPs))
		{
			return true;
		} else {
			$now = new DateTime();
			if ($now->diff($startTime) =< 0 && $now->diff($endTime) >= 0)
			{
				return true;
			} 
		}
		return false;
	}
}
