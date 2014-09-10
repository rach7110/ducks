<?php
// app/models/Duck.php

class Duck extends Eloquent {
  // MASS ASSIGNMENT -------------------------------------------------------
  // define which attributes are mass assignable (for security)
  // we only want these 3 attributes able to be filled
  protected $fillable = array('name', 'email', 'password');

}