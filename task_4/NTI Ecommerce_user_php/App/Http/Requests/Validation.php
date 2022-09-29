<?php

namespace App\Http\Requests;

use App\Database\Models\Model;

class Validation
{
    private string|float|null|array $value;
    private string $valueName;
    private array $errors = [];
    private array $oldValues = [];

    public function required(): self
    {
        if (trim($this->value) == "" || $this->value == null) {
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} is required";
        }
        return $this;
    }

    public function between(int $min, int $max): self
    {
        if (strlen($this->value) < $min || strlen($this->value) > $max) {
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must Be Between {$min},{$max}";
        }

        return $this;
    }

    public function digits(int $digits): self
    {
        if (strlen($this->value) != $digits) {
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must Be {$digits} digits";
        }

        return $this;
    }

    public function regex(string $pattern, $message = null): self
    {
        if (!preg_match($pattern, $this->value)) {
            $this->errors[$this->valueName][__FUNCTION__] = $message ?? "{$this->valueName} Invalid";
        }
        return $this;
    }

    public function in(array $values): self
    {
        if (!in_array($this->value, $values)) {
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} must be " . implode(',', $values);
        }
        return $this;
    }

    public function confirmed($confirmedValue): self
    {
        if ($this->value != $confirmedValue) {
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} not confirmed";
        }
        return $this;
    }

    public function unique(string $table, string  $column): self
    {
        $Model = new Model;
        $result = $Model->search($table, $column, $this->value);
        if ($result->num_rows == 1) {
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} already exists";
        }
        return $this;
    }

    public function exists(string $table, string  $column): self
    {
        $Model = new Model;
        $result = $Model->search($table, $column, $this->value);
        if ($result->num_rows == 0) {
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} not exist";
        }
        return $this;
    }

    /**
     * Get the value of errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function getError($inputName): ?string
    {
        if (isset($this->errors[$inputName])) {
            foreach ($this->errors[$inputName] as $error) {
                return $error;
            }
        }
        return null;
    }

    /**
     * Set the value of valueName
     *
     * @return  self
     */
    public function setValueName($valueName)
    {
        $this->valueName = $valueName;
        return $this;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */
    public function setValue($value)
    {

        $this->value = $value;
        return $this;
    }

    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    public function getMessage($error)
    {
        return "<p class='text-danger font-weight-bold'> " . ucfirst($this->getError($error)) . " </p>";
    }

    /**
     * Get the value of oldValues
     */
    public function getOldValues()
    {
        return $this->oldValues;
    }

    /**
     * Set the value of oldValues
     *
     * @return  self
     */
    public function setOldValues($oldValues)
    {
        $this->oldValues = $oldValues;

        return $this;
    }

    public function getOldValue($inputName): ?string
    {
        if (isset($this->oldValues[$inputName])) {
            return $this->oldValues[$inputName];
        }
        return null;
    }
}