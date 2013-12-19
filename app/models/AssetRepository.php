<?php
interface AssetRepository{
	public function getLastAssets($amount);
	public function getAll($page_count);

}