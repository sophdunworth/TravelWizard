<?php
use PHPUnit\Framework\TestCase;

require_once 'User.php';

class UserTest extends TestCase {
    private $conn;
    private $user;

    protected function setUp(): void {
        // Create a mock for the DB connection
        $this->conn = $this->createMock(mysqli::class);

        // Stub prepare() to return a mock statement object
        $stmtMock = $this->createMock(mysqli_stmt::class);
        $stmtMock->method('bind_param')->willReturn(true);
        $stmtMock->method('execute')->willReturn(true);

        // When prepare is called, return the mock statement
        $this->conn->method('prepare')->willReturn($stmtMock);

        // Now we can safely test User without hitting the DB
        $this->user = new User($this->conn);
    }

    public function testValidPassword() {
        echo "Test 1: Valid Password (should PASS)\n";
        $this->expectNotToPerformAssertions();
        $this->user->setPassword("Abc123!@#");
    }

    public function testPasswordTooShort() {
        echo "Test 2: Too Short (should FAIL)\n";
        $this->expectException(Exception::class);
        $this->user->setPassword("a!2B");
    }

    public function testPasswordWithoutSpecialChar() {
        echo "Test 3: No Special Char (should FAIL)\n";
        $this->expectException(Exception::class);
        $this->user->setPassword("abc123XYZ");
    }

    public function testEmptyPassword() {
        echo "Test 4: Empty (should FAIL)\n";
        $this->expectException(Exception::class);
        $this->user->setPassword("");
    }

    public function testNullPassword() {
        echo "Test 5: Null (should FAIL)\n";
        $this->expectException(Exception::class);
        $this->user->setPassword(null);
    }
}
