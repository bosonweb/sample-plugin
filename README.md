# Sample Plugin
This is an example of how we structure our plugins for Custom Post Types. The sample I have used is for a services section on a Wordpress website.

Custom Post Types are created when there is going to be a section on the website which requires lots of extra fields and will be called from different areas on the website.

## How we create our Custom Post Types
We do not use use third party plugins to create the custom post types, we use the Wordpress functions to register them then call them.

We try to group all the templates and files into must use (mu) plugins so they are completely standalone and this also applies to Custom Post Types. 

We firstly register the custom post types which is wrapped in a function, then called from a file in a custom plugin we have created for that module. 

This sample plugin we have created shows how we consolidate functions, templates and anything else specific for a Custom Post Type.
