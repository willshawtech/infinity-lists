<?php

namespace spec\Willshaw\InfinityLists\Domain\Entity;

use PhpSpec\ObjectBehavior;
use Willshaw\InfinityLists\Domain\Entity\User;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }
}
