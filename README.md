# Ogre Plugin

**This README.md file should be modified to describe the features, installation, configuration, and general usage of the plugin.**

The **Ogre** Plugin is an extension for [Grav CMS](https://github.com/getgrav/grav). Automatically generate redundant OpenGraph metadata tags, attempts to be as hands-free as possible

## Installation

Installing the Ogre plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation (Preferred)

To install the plugin via the [GPM](https://learn.getgrav.org/cli-console/grav-cli-gpm), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

    bin/gpm install ogre

This will install the Ogre plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/ogre`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `ogre`. You can find these files on [GitHub](https://github.com/hughbris/grav-plugin-ogre) or via [GetGrav.org](https://getgrav.org/downloads/plugins).

You should now have all the plugin files under

    /your/site/grav/user/plugins/ogre
	
> NOTE: This plugin is a modular component for Grav which may require other plugins to operate, please see its [blueprints.yaml-file on GitHub](https://github.com/hughbris/grav-plugin-ogre/blob/main/blueprints.yaml).

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/ogre/ogre.yaml` to `user/config/plugins/ogre.yaml` and only edit that copy.

Note that if you use the Admin Plugin, a file with your configuration named ogre.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
brave: # bravely infer these elements using sixth sense™ capability in the plugin
    - 'og:image' # this will grab the page's first image media object when it exists, note that this value infers some 'og:image:*' subtypes FWIW
```

## Usage

I might have to learn and draw one of those [Mermaid diagrams](https://mermaidjs.github.io/) to make the system of template precedence here much clearer. For now, choose your adventure …

### Hands free mode

Enable the plugin and watch the AI/ML of this plugin work its magic ;) OK it's pretty transparent, you'll end up with inferred opengraph metadata like what you see in [`partials/opengraph-metadata.html.twig` here](https://github.com/hughbris/grav-plugin-ogre/blob/develop/templates/partials/opengraph-metadata.html.twig).

(Future versions should allow for overriding this smart og metadata via frontmatter, but not yet.)

**If you're using a theme that defines its own metadata partial** (overriding [`partials/metadata.htmltwig` in Grav core]((https://github.com/getgrav/grav/blob/develop/system/templates/partials/metadata.html.twig))), this plugin won't get a look in.

You can adaptively merge this plugin's [metadata template](https://github.com/hughbris/grav-plugin-ogre/blob/develop/templates/partials/metadata.html.twig) into your theme's metadata template to enjoy its benefits, but then we are no longer hands free. It's OK, you're a coder.

### Hands free with mild anxiety mode

Add extra opengraph metadata elements by enabling this plugin and adding a new custom template with your new elements at `partials/custom-opengraph-metdata.html.twig` into your theme's templates folder. This plugin will pick that up as long as your theme doesn't override the [`partials/metadata.html.twig` file provided by Grav core](https://github.com/getgrav/grav/blob/develop/system/templates/partials/metadata.html.twig). Seek help under "[Hands free mode](#hands-free-mode)" above if this is your fate.

### Control freak mode

The metadata template provided by this plugin will override [the one provided by the Grav system](https://github.com/getgrav/grav/blob/develop/system/templates/partials/metadata.html.twig) when this plugin is enabled.

You can create your own in your theme at `partials/metadata.html.twig` and this plugin will begin to feel very neglected. It will just be chewing cycles.

You can copy the template provided by this theme and incorporate any of:

* the system template,
* the plugin's opengraph template,
* your own version of the plugin's opengraph template,
* a custom opengraph template you put in your theme.

Let's get a diagram on this. Explaining is hard. I thought it would help future me.

### Adverse reactions

_Does this plugin play well with other social/metadata plugins?_

I don't know, I haven't needed to know. This is pragmatic right now. I'd [love to hear](https://github.com/hughbris/grav-plugin-ogre/issues) of any nasty interactions with other plugins and themes. They might bite me in future!

## Credits

**Did you incorporate third-party code? Want to thank somebody?**

## To Do

- [ ] Future plans, if any

