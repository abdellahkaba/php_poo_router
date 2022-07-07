<?php

namespace Exceptions;

use Exception;

class RouteNotFound extends Exception {
    public $message = "Desolé cette n'existe pas ! " ;
}