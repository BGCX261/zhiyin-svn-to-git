
<div>
	<select id="year"></select>
	<select id="month"></select>
	<select id="day"></select>
</div>
adf

<script>
KISSY.use('gallery/dateCascade/1.0/index', function (S, DateCascade) {
    var dateCascade = new DateCascade({
         nodeYear: '#year',
         nodeMonth: '#month',
         nodeDay: '#day',
         dateStart: '2013-01-01',
         dateEnd: '2030-01-01',
         dateDefault: '2013-01-01'
     });
});
</script>

