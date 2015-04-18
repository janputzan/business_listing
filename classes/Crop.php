<?php

/*
	Function to crop image to save space on a server
*/

class Crop {

	public $newImage;
	public $originalImage;
	public $newWidth;
	public $newHeight;
	public $originalWidth;
	public $originalHeight;
	public $fileName;
	public $imageType;


	/**
	* Constructor
	* @param string $imagePath - path to uploaded image
	* @param array $dimensions - dimensions of new image (height, width)
	*
	* @return void
	*/
	public function __construct($imagePath, array $dimensions) {

		$this->getImage($imagePath)->getDimensions()->setDimensions($dimensions)->getFileName()->crop();
	}

	/**
	* Function to get image type and original image
	* @param string $imagePath - path to uploaded image
	*
	* @return $this
	*/
	private function getImage($imagePath) {

		$this->imageType = exif_imagetype($imagePath);

		switch($this->imageType) {

			case '2':
				$this->originalImage = imagecreatefromjpeg($imagePath);
				break;

			case '3':
				$this->originalImage = imagecreatefrompng($imagePath);
				break;

			default:
				return false;
				break;

		}

		return $this;
	}

	/**
	* Function to get image dimensions
	*
	* @return $this
	*/
	private function getDimensions() {

		$this->originalWidth = imagesx($this->originalImage);
		$this->originalHeight = imagesy($this->originalImage);

		return $this;
	}

	/**
	* Function to set image new dimensions
	* @param array $dimensions (height, width)
	*
	* @return $this
	*/
	private function setDimensions(array $dimensions) {

		$this->newHeight = $dimensions['height'];

		$this->newWidth = $dimensions['width'];

		return $this;
	}

	/**
	* Function to crop image
	*
	* @return $this
	*/
	private function crop() {

		$thumb = imagecreatetruecolor($this->newWidth, $this->newHeight);

		// bool imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )
		imagecopyresampled($thumb, $this->originalImage, 
							0, 0,
							0, 0, 
							$this->newWidth, $this->newHeight, 
							$this->originalWidth, $this->originalHeight);

		switch($this->imageType) {

			case '2':
				imagejpeg($thumb, $this->fileName, 80);
				break;

			case '3':
				imagepng($thumb, $this->fileName, 9);
				break;

			default:
				return false;
				break;

		}

		$this->newImage = $thumb; 

		return $this;
	}

	/**
	* Function get file name of new uploaded file
	*
	* @return $this
	*/
	private function getFileName() {

		$target_dir = '../uploads/';

		switch($this->imageType) {

			case '2':
				$this->fileName = $target_dir . date('Y-m-d_H-i-s') . 'logo.jpeg';
				break;

			case '3':
				$this->fileName = $target_dir . date('Y-m-d_H-i-s') . 'logo.png';
				break;

			default:
				return false;
				break;

		}

		return $this;
	}


}