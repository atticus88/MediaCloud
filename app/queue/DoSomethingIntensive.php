<?php

class DoSomethingIntensive
{

	function fire($job, $data)
	{
		File::append(app_path() . '/queue.txt', time() . '----' . $data->asset_id . PHP_EOL);

		$job->delete();
	}
}

 ?>