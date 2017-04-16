# helpers
add to composer.json file: 
{
  "repositories": [
    {
      "type": "package",
      "package": {
        "name": "successus/helpers",
        "version": "dev-master",
        "source": {
          "url": "https://github.com/successus/helpers",
          "type": "git",
          "reference": "origin/master"
        }
      }
    }
  ],
  "require": {
    "successus/helpers": "dev-master"
  }
}
