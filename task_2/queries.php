<?php

class Queries
{
	public $conn;
	function __construct($conn)
	{
		$this->conn = $conn;
	}

	function showTable($sql)
	{
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table><tr><th>First Name</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['emplyee_first_name'] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "Empty result";
		}
	}

	public function q1()
	{
		$sql = 'SELECT emplyee_details_table.emplyee_first_name, emplyee_salary_table.employee_salary FROM emplyee_salary_table JOIN emplyee_details_table ON emplyee_salary_table.employee_id = emplyee_details_table.employee_id WHERE emplyee_salary_table.employee_salary > 50000 ORDER BY  employee_salary DESC;';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table><tr><th>First Name</th><th>employee salary</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['emplyee_first_name'] . "</td><td>" . $row['employee_salary'] . "</tr>";
			}
			echo "</table>";
		} else {
			echo "Empty result";
		}
	}


	public function q2()
	{
		$sql = 'SELECT emplyee_details_table.emplyee_last_name , emplyee_details_table.Graduation_percentile FROM emplyee_details_table WHERE Graduation_percentile > 70 ORDER BY Graduation_percentile DESC; ';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table><tr><th>Last name</th><th>Graduation percentile</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['emplyee_last_name'] . "</td><td>" . $row['Graduation_percentile'] . "</tr>";
			}
			echo "</table>";
		} else {
			echo "empty result";
		}
	}

	public function q3()
	{
		$sql = 'SELECT emplyee_code_table.emplyee_code_name, emplyee_details_table.Graduation_percentile FROM emplyee_details_table JOIN emplyee_salary_table  ON emplyee_salary_table.employee_id = emplyee_details_table.employee_id
		JOIN emplyee_code_table  ON emplyee_salary_table.emplyee_code = emplyee_code_table.employee_code
		WHERE emplyee_details_table.Graduation_percentile < 70 ORDER BY Graduation_percentile DESC; ';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table><tr><th>Employee Code Name</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['emplyee_code_name'] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "empty result";
		}
	}
	public function q4()
	{
		$sql = 'SELECT CONCAT(emplyee_details_table.emplyee_first_name, " ", emplyee_details_table.emplyee_last_name) AS full_name, emplyee_code_table.employee_domain
		FROM emplyee_details_table
		JOIN emplyee_salary_table ON emplyee_salary_table.employee_id = emplyee_details_table.employee_id
		JOIN emplyee_code_table ON emplyee_salary_table.emplyee_code = emplyee_code_table.employee_code
		WHERE employee_domain <> "Java";';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table><tr><th>Full Name</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['full_name'] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "empty result";
		}
	}
	public function q5()
	{
		$sql = 'SELECT emplyee_code_table.employee_domain, SUM(emplyee_salary_table.employee_salary) AS total_salary
		FROM emplyee_details_table
		JOIN emplyee_salary_table ON emplyee_salary_table.employee_id = emplyee_details_table.employee_id
		JOIN emplyee_code_table ON emplyee_salary_table.emplyee_code = emplyee_code_table.employee_code
		GROUP BY emplyee_code_table.employee_domain;';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table><tr><th>Employee Domain</th><th>Sum</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['employee_domain'] . "</td><td>" . $row['total_salary'] . "</tr>";
			}
			echo "</table>";
		} else {
			echo "empty result";
		}
	}
	public function q6()
	{
		$sql = 'SELECT emplyee_code_table.employee_domain, SUM(emplyee_salary_table.employee_salary) AS total_salary
		FROM emplyee_details_table
		JOIN emplyee_salary_table ON emplyee_salary_table.employee_id = emplyee_details_table.employee_id
		JOIN emplyee_code_table ON emplyee_salary_table.emplyee_code = emplyee_code_table.employee_code
		GROUP BY emplyee_code_table.employee_domain
		HAVING total_salary >= 30000;';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table><tr><th>Employee Domain</th><th>Sum</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['employee_domain'] . "</td><td>" . $row['total_salary'] . "</tr>";
			}
			echo "</table>";
		} else {
			echo "empty result";
		}
	}
	public function q7()
	{
		$sql = 'SELECT emplyee_details_table.employee_id
FROM emplyee_details_table
LEFT JOIN emplyee_salary_table ON emplyee_salary_table.employee_id = emplyee_details_table.employee_id
WHERE emplyee_salary_table.emplyee_code IS NULL;';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table><tr><th>Employee Id</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['employee_id'] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "empty result";
		}
	}

	public function employee_code_table()
	{
		$sql = 'SELECT * FROM  emplyee_code_table';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table>
								<tr>
									<th>employee_code_table</th>
								</tr>
								<tr>
									<th>employee_code</th><th>employee_code_name</th><th>employee_domain</th>
								</tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['employee_code'] . "</td>";
				echo "<td>" . $row['emplyee_code_name'] . "</td>";
				echo "<td>" . $row['employee_domain'] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "Empty result";
		}
	}

	public function employee_details_table()
	{
		$sql = 'SELECT * FROM  emplyee_details_table';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table>
				<tr>
					<th>emplyee_details_table</th>
				</tr>
				<tr>
					<th>employee_id</th><th>employee_first_name</th><th>employee_last_name</th><th>Graduation_percentile</th>
				</tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['employee_id'] . "</td>";
				echo "<td>" . $row['emplyee_first_name'] . "</td>";
				echo "<td>" . $row['emplyee_last_name'] . "</td>";
				echo "<td>" . $row['Graduation_percentile'] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "Empty result";
		}
	}

	public function employee_salary_table()
	{
		$sql = 'SELECT * FROM  emplyee_salary_table';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table>
			<tr>
				<th>emplyee_salary_table</th>
			</tr>
			<tr>
				<th>employee_id</th><th>employee_salary</th><th>emplyee_code</th>
			</tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row['employee_id'] . "</td>";
				echo "<td>" . $row['employee_salary'] . "</td>";
				echo "<td>" . $row['emplyee_code'] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "Empty result";
		}
	}
}
?>