<?php

namespace Railken\LaraOre\Tests\Work;

use Railken\LaraOre\Work\WorkFaker;
use Railken\LaraOre\Work\WorkManager;

class WorkerFileTest extends BaseTest
{
    /**
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new WorkManager();
    }

    public function testWorkerFile1()
    {
        $result = $this->getManager()->create(WorkFaker::make()->parametersWithFile());

        $this->assertEquals(true, $result->ok());

        $work = $result->getResource();

        $this->getManager()->dispatch($work, [
            'message' => 'Hello',
        ]);
    }

    public function testWorkerFile2()
    {
        $result = $this->getManager()->create(WorkFaker::make()->parametersWithFile());
        $result = $this->getManager()->create(WorkFaker::make()->parametersWithFile());

        $this->assertEquals(true, $result->ok());

        $work = $result->getResource();

        $this->getManager()->dispatch($work, [
            'message' => 'Hello',
        ], [$work]);
    }
}
