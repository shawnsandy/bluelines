# From request methods

Form request methods allow you to quickly validate, store and edit content.


### Save Content

``` php

/**
* Save, Upload, Sync content
*
* @param $post post object
*/

public function store(BluelineFormRequest $request) {

   $post = $request->save();

}

```

### Edit Content

``` php

/**
* Save, Upload, Sync content
*
* @param $post post object
*/

public function store(BluelineFormRequest $request) {

   $post = $request->update();

}

```

### Sync Eloquent Relationships

Store or update content relationships, categories and tags

``` php

/**
* Sync /  attach all related fields to pivot tables
*
* @param $post post object
*/

public function store(BluelineFormRequest $request) {
    

if($request->save()):


// sync categories and tags 

    $request->syncRelated();

endif
}

```
