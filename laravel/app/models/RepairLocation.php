<?php
 
class RepairLocation extends Eloquent {
 
 	protected $table = 'repair_locations';
 	protected $primaryKey = 'repairderID';

 	protected $softDelete = true;
}