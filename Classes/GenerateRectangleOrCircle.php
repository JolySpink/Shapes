<?php
interface View
{
    public function view() ;
}

class GenerateRectangleOrCircle  implements View
{

    private $arrShapes = [];

    public function Rectangle(){
        $width = rand(1,10);
        $height = rand(1,10);

        $area = $width *$height ;
        $rectangle=["Прямоугольник: ". $width.'x'.$height, $area];
        return $rectangle ;

    }
    public function Circle(){
        $radius = rand(1,10);
        $area = $radius *2;
        $circle=["Круг: r". $radius, $area];
        return $circle ;

    }
    public function randFigure($count = 10) : View{
        $shapes=['Rectangle','Circle'];


        for($i=0;$i<$count;$i++){
            $functionRand = array_rand($shapes);
           $function= $this->{$shapes[$functionRand]}();
        $this->arrShapes[$i]['figure'] = $function[0];
        $this->arrShapes[$i]['area'] = $function[1];
        }
        return $this;
    }

    public function view()
    {
        $Shapes = array_column($this->arrShapes, 'area');

        array_multisort($Shapes, SORT_ASC, $this->arrShapes);

      return $this->arrShapes ;

    }

}