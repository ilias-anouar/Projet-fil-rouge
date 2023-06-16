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
                <input class="form-control " type="number" id="height" name="height" required>
            </div>
            <div class="form-group">
                <label for="weight">Weight (in kg):</label>
                <input class=" form-control" type="number" id="weight" name="weight" required>
            </div>
            <div class="form-group">
                <label for="neck">Neck circumference (in cm):</label>
                <input class=" form-control" type="number" id="neck" name="neck" required>
            </div>
            <div class="form-group">
                <label for="waist">Waist circumference (in cm):</label>
                <input class="form-control" type="number" id="waist" name="waist" required>
            </div>
            <div class="form-group">
                <label for="hip">Hip circumference (in cm):</label>
                <input class="form-control" type="number" id="hip" name="hip" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" class="form-control">
                    <option selected>__Please select a gender__</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cactivity">Activity:</label>
                <select id="cactivity" name="cactivity" class="form-control">
                    <option value="1">Basal Metabolic Rate (BMR)</option>
                    <option value="1.2">Sedentary: little or no exercise</option>
                    <option value="1.375">Light: exercise 1-3 times/week</option>
                    <option value="1.465" selected="">Moderate: exercise 4-5 times/week</option>
                    <option value="1.55">Active: daily exercise or intense exercise 3-4 times/week</option>
                    <option value="1.725">Very Active: intense exercise 6-7 times/week</option>
                    <option value="1.9">Extra Active: very intense exercise daily, or physical job</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
            <button type="submit" class="btn bg-orange">Submit</button>
        </div>
    </form>
</div>