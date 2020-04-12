<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use OpenApi\Annotations\Contact;
use OpenApi\Annotations\Info;
use OpenApi\Annotations\License;
use OpenApi\Annotations\OpenApi;

/**
 * Class BaseApiController
 * @package App\Http\Controllers\Api
 *
 * @OpenApi(
 *   @Info(
 *     version="1.0.0",
 *     title="Laravel Weather Demo Documentation",
 *     description="OpenApi description",
 *     @Contact(email="mogohax@users.noreply.github.com"),
 *     @License(name="wtfpl", url="http://www.wtfpl.net/")
 *   ),
 * )
 */
class BaseApiController extends Controller
{

}
