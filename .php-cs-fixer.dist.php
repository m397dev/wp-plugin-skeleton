<?php

use Nexus\CsConfig\Factory;
use Nexus\CsConfig\Ruleset\Nexus82;

return Factory::create( new Nexus82() )->forProjects();