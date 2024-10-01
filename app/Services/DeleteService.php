<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteService
{
    /**
     * Delete a record by ID for a given model.
     *
     * @param string $modelClass
     * @param int $id
     * @return bool|string Returns true on success, or an error message on failure.
     */
    public function deleteRecord(string $modelClass, int $id)
    {
        try {
            // Find the model instance by ID
            $instance = $modelClass::findOrFail($id); // Throws an exception if not found

            // Delete the instance
            $instance->delete();

            return true; // Deletion successful
        } catch (ModelNotFoundException $e) {
            return 'Record not found'; // Return an error message if record is not found
        } catch (\Exception $e) {
            return 'An error occurred: ' . $e->getMessage(); // Handle any other exceptions
        }
    }
}
