<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'films';

    /*
 /*
CREATE TABLE `films` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `episode_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` int(11) NOT NULL,
  `episode_num` int(11) NOT NULL,
  `date_show` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci 
 */

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
}
