<?php
class Database extends PDO
{
	/**
	 * @param $DB_TYPE
	 * @param $DB_CHARSET
	 * @param $DB_HOST
	 * @param $DB_NAME
	 * @param $DB_USER
	 * @param $DB_PASS
	 */
	public function __construct($DB_TYPE, $DB_CHARSET, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct(
			$DB_TYPE
			.':host='.$DB_HOST
			.';dbname='.$DB_NAME
			.';charset='.$DB_CHARSET
			,$DB_USER
			,$DB_PASS
		);
	}

	/**
	 * @param string $query
	 * @param array $array
	 * @return array|false
	 */
	public function select(string $query, array $array = [])
	{
		$result = $this->prepare($query);
		foreach ($array as $key => $value) {
			$result->bindValue("$key", $value);
		}
		$result->execute();
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * @param string $table
	 * @param array $data
	 * @return false|string
	 */
	public function insert(string $table, array $data)
	{
		ksort($data);
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		$result = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		foreach ($data as $key => $value) {
			$result->bindValue(":$key", $value);
		}
		$result->execute();

		return $this->lastInsertId();
	}
}