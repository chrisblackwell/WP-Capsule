# WP Capsule

WP Capsule is easy to use WordPress starter theme. The theme includes easy to use functions and helpers for keeping your WordPress theme clean and easy to maintain.

### Installation

To install the themme, you must copy the entire folder into your themes directory. Feel free to rename the folder to whatever your theme will be called. Also update the `style.css` file with your theme's information.

Run the following commands from the terminal from inside the theme folder.

```
composer install
npm install
```

### Custom Post Type Class

Creating custom post types has never been easier with the built-in Custom Post Type class.

Let's create a custom post type for cars. We woud pass the singular name to the constructor, and it will automatically be pluralized for you.
```php
$car = new WebDevDude\CustomPostType('Car');
```

We also have full control and can pass any options available in the [WordPress Codex](https://codex.wordpress.org/Function_Reference/register_post_type)

If we want to specify our plural name, we can pass it as the second parameter.

Let's create another post type for our inventory. We can pass it the plural name, and an array of options to override the defaults.
```php
$inventory = new WebDevDude\CustomPostType('Inventory', 'Inventories', array(
  'menu_icon' => 'dashicons-performance',
  'hierarchical' => true,
  'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes')
));
```

### Add Taxonomies

Adding taxonomies is just as easy. We just extend our object we just created.
```php
$inventory->add_taxonomy('Warehouse Section', array('hierarchical' => true));
$inventory->add_taxonomy('Inventory Category', 'Inventory Categories');
```

### Custom Meta Boxes FTW

Adding meta boxes will full control over type and style is very easy.
```php
$inventory->add_meta_box(
  'Inventory Details',
    array(
      array('name' => 'Retail Price', 'class' => 'half-width'),
      array('name' => 'Weekly Price', 'class' => 'half-width'),
      array('name' => 'Boat Only Price', 'class' => 'half-width'),
      array('name' => 'Included Motor & Trailer')
    ),
    'side',
    'default'
  );
```
