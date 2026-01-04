<?php declare(strict_types=1);

namespace Berry\Html5\Enums;

/**
 * ARIA Role Definitions
 * Based on WAI-ARIA 1.2/1.3 and MDN Reference
 * @link https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Reference/Roles
 */
enum AriaRole: string
{
    case Banner = 'banner';
    case Complementary = 'complementary';
    case ContentInfo = 'contentinfo';
    case Form = 'form';
    case Main = 'main';
    case Navigation = 'navigation';
    case Region = 'region';
    case Search = 'search';
    case Button = 'button';
    case Checkbox = 'checkbox';
    case GridCell = 'gridcell';
    case Link = 'link';
    case MenuItem = 'menuitem';
    case MenuItemCheckbox = 'menuitemcheckbox';
    case MenuItemRadio = 'menuitemradio';
    case Option = 'option';
    case ProgressBar = 'progressbar';
    case Radio = 'radio';
    case Scrollbar = 'scrollbar';
    case Searchbox = 'searchbox';
    case Separator = 'separator';
    case Slider = 'slider';
    case SpinButton = 'spinbutton';
    case Switch = 'switch';
    case Tab = 'tab';
    case TabPanel = 'tabpanel';
    case TreeItem = 'treeitem';
    case ComboBox = 'combobox';
    case Grid = 'grid';
    case ListBox = 'listbox';
    case Menu = 'menu';
    case MenuBar = 'menubar';
    case RadioGroup = 'radiogroup';
    case TabList = 'tablist';
    case Tree = 'tree';
    case TreeGrid = 'treegrid';
    case Application = 'application';
    case Article = 'article';
    case Cell = 'cell';
    case ColumnHeader = 'columnheader';
    case Definition = 'definition';
    case Directory = 'directory';
    case Document = 'document';
    case Feed = 'feed';
    case Figure = 'figure';
    case Group = 'group';
    case Heading = 'heading';
    case Img = 'img';
    case List = 'list';
    case ListItem = 'listitem';
    case Math = 'math';
    case None = 'none';
    case Note = 'note';
    case Presentation = 'presentation';
    case Row = 'row';
    case RowGroup = 'rowgroup';
    case RowHeader = 'rowheader';
    case Table = 'table';
    case Term = 'term';
    case Toolbar = 'toolbar';
    case Tooltip = 'tooltip';
    case Alert = 'alert';
    case Log = 'log';
    case Marquee = 'marquee';
    case Status = 'status';
    case Timer = 'timer';
    case AlertDialog = 'alertdialog';
    case Dialog = 'dialog';
}
