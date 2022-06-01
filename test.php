<?php
namespace app {
    use app\legacymaintencechecker;

    class maintencemode
    {
        public $helper;

        /** constructor */
        public function __construct(MaintenceHelper $helper) {
            $this->helper = $helper;
        }

        private $reason;

        public function setisup (bool $isUp, $reason) {
            $this->helper->setIsUp($isUp);
            $this->reason = $reason;
        }
        function getReason(): string
        {
            return "Sorry we are down: " .$this->reason;
        }


        public function isDown()
        {
            return $this->helper->isDown();
        }
    }


    class MaintenceHelper
    {

        public function setisup(bool $isUp, $reason)
        {
            $this->isUp = $isUp;
        }

        public function isUp() {
            return $this->up;
        }



        public function isDown(): bool
        {
            return !$this->up;
        }
    }
}
namespace {

$helper = new \app\MaintenceHelper;
echo "<pre>" . print_r($_SERVER,true) . "</pre>";
$helper->setIsUp($_SERVER['ENV_IS_UP'], $_SERVER['ENV_DOWN_REASON']);
if(($mode = new \app\maintencemode($helper))->isDown()) {
    die($mode->getReason());
}

return file_get_contents('website.html');
}  