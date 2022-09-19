<?php
use Carbon\Carbon;

function loadImage($image){
	return asset('').$image;
}

function formatDateDB($date){
	return Carbon::parse($date)->format('Y/m/d');
}