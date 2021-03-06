<?php
/**
 * @copyright Bluz PHP Team
 * @link https://github.com/bluzphp/bluzman
 */

namespace Bluzman\Tests\Command\Init;

use Bluzman\Command\Init;

use Faker;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\StreamOutput;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Filesystem\Filesystem;


/**
 * @author Pavel Machekhin
 * @created 2014-07-10 15:04
 */

class ModuleCommandTest extends AbstractCommandTest
{
    /**
     * @var string
     */
    protected $moduleName;

    public function setUp()
    {
        parent::setUp();

        $container = new \Mockery\Container;

        $app = $container->mock('\Bluzman\Application\Application[getWorkingPath]')
            ->shouldDeferMissing()
            ->shouldAllowMockingProtectedMethods();

        $app->shouldReceive('getWorkingPath')
            ->atLeast(1)
            ->andReturn($this->workingPath)
            ->getMock();

        $this->setApplication($app);

        $this->moduleName = $this->getFaker()->lexify();
    }

    public function testCorrectWorkflow()
    {
        $command = new Init\ModuleCommand();

        $this->getApplication()->addCommands([$command]);

        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
            '--name' => $this->moduleName
        ]);

        // check that all needed folders were created
        $this->assertTrue($command->verify($command->getInput(), $command->getOutput()));

        $display = $commandTester->getDisplay();

        // check all messages were displayed
        $this->assertRegExp('/Running "init:module" command/', $display);
        $this->assertRegExp('/has been successfully created/', $display);
    }
}
