<?php
namespace Department;

require_once 'User.php';

class Department {
    private int $id;
	private string $name;
	private int $employees;

    public function __construct(int $id, string $name = '', int $employees = 0) {
        $this->id = $id;
        $this->name = $name; 
        $this->employees = $employees;
    }

	public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getEmployees(): int {
        return $this->employees;
    }

    public function setEmployees(int $employees): void {
        $this->employees = $employees;
    }
}