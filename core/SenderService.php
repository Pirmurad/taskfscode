<?php

namespace Core;

abstract class SenderService
{
    abstract public function formBuilder();
    abstract public function send();
}