<?php
namespace Users;
interface CentralInterface
{
    /*
    This interface forces Other classes to be compatible by User class fillables. 
    */
    public function setLocaleFillable();
    public function getLocaleFillable();
    public function getLocalValidation();
    public function getFillableItemKeys();
}
