<?php
namespace DBFaker\Generators;


use Doctrine\DBAL\Schema\Column;
use Faker\Factory;
use Faker\Generator;

class SimpleGenerator implements FakeDataGeneratorInterface
{

    /**
     * @var string
     */
    private $fakerProperty;

    /**
     * @var Generator
     */
    private $faker;

    public function __construct(string $fakerProperty, $generateUniqueValues = false)
    {
        $this->faker = Factory::create();
        if ($generateUniqueValues){
            $this->faker->unique();
        }
        $this->fakerProperty = $fakerProperty;
    }

    public function __invoke(Column $column)
    {
        return $this->faker->{fakerProperty};
    }


}