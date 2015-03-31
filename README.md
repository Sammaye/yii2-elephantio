# yii2-elephantio
Yii2 Elephant IO implementation.

This is a really dirt simple extension which just wraps the Elephant IO module into a Yii2 Component.

You can configure it in your application configuration like so:

	'elephantio' => [
		'class' => 'sammaye\elephantio\ElephantIo',
		'host' => 'http://localhost:3000'
	]

Adding it to your `components` array.

**Note:** Elephant IO only supports websockets.

You can use it like so:

	Yii::$app->elephantio->emit('some event', ['param1' => 'value1']);
	Yii::$app->elephantio->read();
	
And that's it...literally.
