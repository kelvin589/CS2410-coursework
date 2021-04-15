<form>
    <!-- Select does not have a value attribute. Must programatically change the value show. -->
    @php
        function checkType($selected_type, $old_type) {
            return $selected_type==$old_type ? 'selected' : '';
        }
    @endphp
    <select name="type" id="type" onchange='this.form.submit()'>
        <option value="" selected disabled hidden>Select the animal type</option>
        <option {{ checkType('all', old('type')) }} value="all">All</option>
        <option {{ checkType('mammal', old('type')) }} value="mammal">Mammal</option>
        <option {{ checkType('bird', old('type')) }} value="bird">Bird</option>
        <option {{ checkType('reptile', old('type')) }} value="reptile">Reptile</option>
        <option {{ checkType('amphibian', old('type')) }} value="amphibian">Amphibian</option>
        <option {{ checkType('fish', old('type')) }} value="fish">Fish</option>
        <option {{ checkType('invertebrate', old('type')) }} value="invertebrate">Invertebrate</option>
    </select>
</form>