<h2 class="text-center">Custom Plan Measurement Form</h2>
<p class="text-center">In order to build a custom plan for you, we need the following measurements:
</p>
<div class="card bg-navy color-palette">
    <!-- <div class="card-header bg-light color-palette">
        <h3 class="card-title">Measures</h3>
    </div> -->
    <!-- /.card-header -->
    <!-- form start -->
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="height">Height (in cm):</label>
                <input class="form-control form-control-lg" type="number" id="height" name="height" required>
            </div>
            <div class="form-group">
                <label for="weight">Weight (in kg):</label>
                <input class="form-control form-control-lg" type="number" id="weight" name="weight" required>
            </div>
            <div class="form-group">
                <label for="neck">Neck circumference (in cm):</label>
                <input class="form-control form-control-lg" type="number" id="neck" name="neck" required>
            </div>
            <div class="form-group">
                <label for="waist">Waist circumference (in cm):</label>
                <input class="form-control form-control-lg" type="number" id="waist" name="waist" required>
            </div>
            <div class="form-group">
                <label for="hip">Hip circumference (in cm):</label>
                <input class="form-control form-control-lg" type="number" id="hip" name="hip" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" class="form-control form-control-lg">
                    <option selected>__Please select a gender__</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-white">
            <button type="submit" class="btn  btn-lg bg-orange text-white">Submit</button>
        </div>
    </form>
</div>