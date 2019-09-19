<?php

class UnholyFactory
{
    public $factory = Array();
    public function absorb($style) {
        $type = new ReflectionClass($style);
        if ($type->getParentClass()) {
            $name = $style->get_name();
            if (array_key_exists($name, $this->factory)) {
                print ("(Factory already absorbed a fighter of type ".$name.")".PHP_EOL);
            } else {
                $this->factory[$name] = $style;
                print ("(Factory absorbed a fighter of type ".$name.")".PHP_EOL);
            }
        } else {
            print ("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
        }
    }
    public function fabricate($fighter) {
        if (array_key_exists($fighter, $this->factory)) {
            print ("(Factory fabricates a fighter of type ".$fighter.")".PHP_EOL);
            return clone $this->factory[$fighter];
        } else {
            print ("(Factory hasn't absorbed any fighter of type ".$fighter.")".PHP_EOL);
            return null;
        }
    }
}
?>
