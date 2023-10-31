<?php

ini_set('display_errors', 1);

class SportsWatch
{
    private $brand;
    private $model;
    private $color;
    private $stepCounter = 0;
    private $heartRate = 0;
    private $gpsEnabled = false;
    private $timerRunning = false;
    private $timer = 0;
    private $alarmEnabled = false;
    private $waterproof = false;

    public function __construct($brand, $model, $color)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getStepCount()
    {
        return $this->stepCounter;
    }

    public function getHeartRate()
    {
        return $this->heartRate;
    }

    public function isGPSEnabled()
    {
        return $this->gpsEnabled;
    }

    public function toggleGPS()
    {
        $this->gpsEnabled = !$this->gpsEnabled;
    }

    public function isTimerRunning()
    {
        return $this->timerRunning;
    }

    public function startTimer()
    {
        if (!$this->timerRunning) {
            $this->timerRunning = true;
            $this->timer = 0;
        }
    }

    public function stopTimer()
    {
        if ($this->timerRunning) {
            $this->timerRunning = false;
        }
    }

    public function getTimerValue()
    {
        return $this->timer;
    }

    public function toggleAlarm()
    {
        $this->alarmEnabled = !$this->alarmEnabled;
    }

    public function isAlarmEnabled()
    {
        return $this->alarmEnabled;
    }

    public function setWaterproof($waterproof)
    {
        $this->waterproof = $waterproof;
    }

    public function isWaterproof()
    {
        return $this->waterproof;
    }

    public function recordStep()
    {
        $this->stepCounter++;
    }

    public function measureHeartRate()
    {
        // Simulate heart rate measurement
        $this->heartRate = rand(60, 160); // Random heart rate between 60 and 160 bpm
    }
}

$liWatch = new SportsWatch("Li", "X1", "Black");

// 模拟按下按钮，改变状态
$liWatch->toggleGPS();
$liWatch->startTimer();
$liWatch->recordStep();
$liWatch->measureHeartRate();
$liWatch->toggleAlarm();
$liWatch->setWaterproof(true);

echo "Brand: " . $liWatch->getBrand() . "<br>";
echo "Model: " . $liWatch->getModel() . "<br>";
echo "Color: " . $liWatch->getColor() . "<br>";
echo "GPS Enabled: " . ($liWatch->isGPSEnabled() ? "Yes" : "No") . "<br>";
echo "Timer Running: " . ($liWatch->isTimerRunning() ? "Yes" : "No") . "<br>";
echo "Timer Value: " . $liWatch->getTimerValue() . " seconds<br>";
echo "Step Count: " . $liWatch->getStepCount() . "<br>";
echo "Heart Rate: " . $liWatch->getHeartRate() . " bpm<br>";
echo "Alarm Enabled: " . ($liWatch->isAlarmEnabled() ? "Yes" : "No") . "<br>";
echo "Waterproof: " . ($liWatch->isWaterproof() ? "Yes" : "No") . "<br>";
?>
