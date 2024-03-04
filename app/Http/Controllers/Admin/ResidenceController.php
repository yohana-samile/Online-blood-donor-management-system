<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Http\JSonHttpResponse;
    use App\Models\Location;
    use App\Models\Region;
    use DB;
    use Illuminate\Validation\ValidationException;

    class ResidenceController extends Controller {
        public function index(){
            return view('residence-locations/index');
        }


        // upload locations
        public function uploadLocation(Request $request) {
            try {
                // Validate the incoming request data
                $this->validate($request, [
                    'csvFile' => 'required|mimes:csv,txt|max:5048',
                ]);

                // Get the file content as an array of rows
                $file = $request->file('csvFile');
                $fileContent = file_get_contents($file);
                $rows = explode("\n", $fileContent);

                // Remove header row and the first two rows
                array_shift($rows);
                array_shift($rows);

                // Iterate over rows and create User records
                foreach ($rows as $row) {
                    $rowData = str_getcsv($row);
                    // Create a new Location record
                    $location = new Location();
                    $location->region = $rowData[0];
                    $location->regioncode = $rowData[1];
                    $location->district = $rowData[2];
                    $location->districtcode = $rowData[3];
                    $location->ward = $rowData[4];
                    $location->wardcode = $rowData[5];
                    $location->street = $rowData[6];
                    $location->places = $rowData[7];
                    $location->save();
                }
            }
            catch (ValidationException $e) {
                $errorMessages = [];
                foreach ($e->errors() as $fieldErrors) {
                    $errorMessages = array_merge($errorMessages, $fieldErrors);
                }
                $errorMessage = implode("\n", $errorMessages);
                return response()->json(["error" =>"/residence-locations/"]);
                // notify()->error($errorMessage);
            }
            catch (\Exception $e) {
                // notify()->error('CSV file uploaded successfully.');
                return response()->json(["success" =>"/residence-locations/"]);
            }
            // return redirect()->back();
            return response()->json(["success" =>"/residence-locations/"]);
        }


        // regions
        public function uploadRegions(Request $request) {
            try {
                // Validate the incoming request data
                $this->validate($request, [
                    'csvFile' => 'required|mimes:csv,txt|max:5048',
                ]);

                // Get the file content as an array of rows
                $file = $request->file('csvFile');
                $fileContent = file_get_contents($file);
                $rows = explode("\n", $fileContent);

                // Remove header row and the first two rows
                array_shift($rows);
                array_shift($rows);

                // Iterate over rows and create User records
                foreach ($rows as $row) {
                    $rowData = str_getcsv($row);
                    // Create a new Location record
                    $location = new Region();
                    $location->id = $rowData[0];
                    $location->name = $rowData[1];
                    $location->code = $rowData[2];
                    $location->save();
                }
            }
            catch (ValidationException $e) {
                $errorMessages = [];
                foreach ($e->errors() as $fieldErrors) {
                    $errorMessages = array_merge($errorMessages, $fieldErrors);
                }
                $errorMessage = implode("\n", $errorMessages);
                return response()->json(["error" =>"/residence-locations/"]);
                // notify()->error($errorMessage);
            }
            catch (\Exception $e) {
                // notify()->error('CSV file uploaded successfully.');
                return response()->json(["success" =>"/residence-locations/"]);
            }
            // return redirect()->back();
            return response()->json(["success" =>"/residence-locations/"]);
        }
    }
