<?php
namespace App\App\Domain;

interface ServiceInterface 
{
    public function handle($data = []);
}