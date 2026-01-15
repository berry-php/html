<?php declare(strict_types=1);

namespace Berry\Html;

// This file was automatically generated and should not be edited manually

use Berry\Html\Elements\A;
use Berry\Html\Elements\Abbr;
use Berry\Html\Elements\Address;
use Berry\Html\Elements\Article;
use Berry\Html\Elements\Aside;
use Berry\Html\Elements\Audio;
use Berry\Html\Elements\B;
use Berry\Html\Elements\Base;
use Berry\Html\Elements\Blockquote;
use Berry\Html\Elements\Body;
use Berry\Html\Elements\Br;
use Berry\Html\Elements\Button;
use Berry\Html\Elements\Canvas;
use Berry\Html\Elements\Code;
use Berry\Html\Elements\Datalist;
use Berry\Html\Elements\Dd;
use Berry\Html\Elements\Del;
use Berry\Html\Elements\Details;
use Berry\Html\Elements\Dialog;
use Berry\Html\Elements\Div;
use Berry\Html\Elements\Dl;
use Berry\Html\Elements\Dt;
use Berry\Html\Elements\Em;
use Berry\Html\Elements\Fieldset;
use Berry\Html\Elements\Footer;
use Berry\Html\Elements\Form;
use Berry\Html\Elements\H1;
use Berry\Html\Elements\H2;
use Berry\Html\Elements\H3;
use Berry\Html\Elements\H4;
use Berry\Html\Elements\H5;
use Berry\Html\Elements\H6;
use Berry\Html\Elements\Head;
use Berry\Html\Elements\Header;
use Berry\Html\Elements\Hr;
use Berry\Html\Elements\Html;
use Berry\Html\Elements\I;
use Berry\Html\Elements\Iframe;
use Berry\Html\Elements\Img;
use Berry\Html\Elements\Input;
use Berry\Html\Elements\Ins;
use Berry\Html\Elements\Label;
use Berry\Html\Elements\Legend;
use Berry\Html\Elements\Li;
use Berry\Html\Elements\Link;
use Berry\Html\Elements\Main;
use Berry\Html\Elements\Mark;
use Berry\Html\Elements\Meta;
use Berry\Html\Elements\Meter;
use Berry\Html\Elements\Nav;
use Berry\Html\Elements\Ol;
use Berry\Html\Elements\Optgroup;
use Berry\Html\Elements\Option;
use Berry\Html\Elements\P;
use Berry\Html\Elements\Pre;
use Berry\Html\Elements\Progress;
use Berry\Html\Elements\Script;
use Berry\Html\Elements\Section;
use Berry\Html\Elements\Select;
use Berry\Html\Elements\Small;
use Berry\Html\Elements\Span;
use Berry\Html\Elements\Strong;
use Berry\Html\Elements\Style;
use Berry\Html\Elements\Sub;
use Berry\Html\Elements\Summary;
use Berry\Html\Elements\Sup;
use Berry\Html\Elements\Table;
use Berry\Html\Elements\TBody;
use Berry\Html\Elements\Td;
use Berry\Html\Elements\TextArea;
use Berry\Html\Elements\TFoot;
use Berry\Html\Elements\Th;
use Berry\Html\Elements\THead;
use Berry\Html\Elements\Time;
use Berry\Html\Elements\Title;
use Berry\Html\Elements\Tr;
use Berry\Html\Elements\U;
use Berry\Html\Elements\Ul;
use Berry\Html\Elements\Video;

/**
 * The HTML <a> element (or anchor element), with its href attribute, creates a hyperlink to web pages, files, email addresses, locations in the same page, or anything else a URL can address.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a
 */
function a(): A
{
    return new A();
}

/**
 * The HTML <abbr> element represents an abbreviation or acronym.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr
 */
function abbr(): Abbr
{
    return new Abbr();
}

/**
 * The HTML <address> element indicates that the enclosed HTML provides contact information for a person or people, or for an organization.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/address
 */
function address(): Address
{
    return new Address();
}

function article(): Article
{
    return new Article();
}

function aside(): Aside
{
    return new Aside();
}

/**
 * The HTML <audio> element is used to embed sound content in documents.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio
 */
function audio(): Audio
{
    return new Audio();
}

function b(): B
{
    return new B();
}

/**
 * The HTML <base> element specifies the base URL to use for all relative URLs in a document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/base
 */
function base(): Base
{
    return new Base();
}

/**
 * The HTML <blockquote> element indicates that the enclosed text is an extended quotation. Usually, this is rendered visually by indentation.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote
 */
function blockquote(): Blockquote
{
    return new Blockquote();
}

function body(): Body
{
    return new Body();
}

/**
 * The HTML <br> element represents a line break. It is a void element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/br
 */
function br(): Br
{
    return new Br();
}

/**
 * The HTML <button> element is an interactive element activated by a user with a mouse, keyboard, finger, voice command, or other assistive technology. Once activated, it then performs an action, such as submitting a form or opening a dialog.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button
 */
function button(): Button
{
    return new Button();
}

/**
 * The HTML <canvas> element is used to draw graphics, on the fly, via JavaScript.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/canvas
 */
function canvas(): Canvas
{
    return new Canvas();
}

function code(): Code
{
    return new Code();
}

/**
 * The HTML <datalist> element contains a set of <option> elements that represent the permissible or recommended options available to choose from within other controls.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/datalist
 */
function datalist(): Datalist
{
    return new Datalist();
}

/**
 * The HTML <dd> element provides the description, definition, or value for the preceding term (<dt>) in a description list (<dl>).
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dd
 */
function dd(): Dd
{
    return new Dd();
}

/**
 * The HTML <del> element represents a range of text that has been deleted from a document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/del
 */
function del(): Del
{
    return new Del();
}

/**
 * The HTML <details> element creates a disclosure widget in which information is visible only when the widget is toggled into an "open" state.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details
 */
function details(): Details
{
    return new Details();
}

/**
 * The HTML <dialog> element represents a dialog box or other interactive component, such as a dismissible alert, inspector, or subwindow.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dialog
 */
function dialog(): Dialog
{
    return new Dialog();
}

function div(): Div
{
    return new Div();
}

/**
 * The HTML <dl> element represents a description list. The element encloses a list of groups of terms (specified using the <dt> element) and descriptions (provided by <dd> elements).
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dl
 */
function dl(): Dl
{
    return new Dl();
}

/**
 * The HTML <dt> element specifies a term in a description or definition list, and as such must be used inside a <dl> element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dt
 */
function dt(): Dt
{
    return new Dt();
}

/**
 * The HTML <em> element marks text that has stress emphasis. The <em> element can be nested, with each level of nesting indicating a greater degree of emphasis.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/em
 */
function em(): Em
{
    return new Em();
}

/**
 * The HTML <fieldset> element is used to group several controls as well as labels (<label>) within a web form.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/fieldset
 */
function fieldset(): Fieldset
{
    return new Fieldset();
}

function footer(): Footer
{
    return new Footer();
}

/**
 * The HTML <form> element represents a document section containing interactive controls for submitting information.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form
 */
function form(): Form
{
    return new Form();
}

function h1(): H1
{
    return new H1();
}

function h2(): H2
{
    return new H2();
}

function h3(): H3
{
    return new H3();
}

function h4(): H4
{
    return new H4();
}

function h5(): H5
{
    return new H5();
}

function h6(): H6
{
    return new H6();
}

/**
 * The HTML <head> element contains machine-readable information (metadata) about the document, like its title, scripts, and style sheets.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/head
 */
function head(): Head
{
    return new Head();
}

function header(): Header
{
    return new Header();
}

function hr(): Hr
{
    return new Hr();
}

/**
 * The HTML <html> element represents the root (top-level element) of an HTML document, so it is also referred to as the root element. All other elements must be descendants of this element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html
 */
function html(): Html
{
    return new Html();
}

function i(): I
{
    return new I();
}

/**
 * The HTML <iframe> element represents a nested browsing context, embedding another HTML page into the current one.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe
 */
function iframe(): Iframe
{
    return new Iframe();
}

/**
 * The HTML <img> element embeds an image into the document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img
 */
function img(): Img
{
    return new Img();
}

/**
 * The HTML <input> element is used to create interactive controls for web-based forms in order to accept data from the user.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input
 */
function input(): Input
{
    return new Input();
}

/**
 * The HTML <ins> element represents a range of text that has been added to a document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ins
 */
function ins(): Ins
{
    return new Ins();
}

/**
 * The HTML <label> element represents a caption for an item in a user interface.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/label
 */
function label(): Label
{
    return new Label();
}

/**
 * The HTML <legend> element represents a caption for the content of its parent <fieldset>.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/legend
 */
function legend(): Legend
{
    return new Legend();
}

function li(): Li
{
    return new Li();
}

/**
 * The HTML <link> element specifies relationships between the current document and an external resource.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
 */
function link(): Link
{
    return new Link();
}

function main(): Main
{
    return new Main();
}

/**
 * The HTML <mark> element represents text which is marked or highlighted for reference or notation purposes.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/mark
 */
function mark(): Mark
{
    return new Mark();
}

/**
 * The HTML <meta> element represents metadata that cannot be represented by other HTML meta-related elements, like <base>, <link>, <script>, <style> or <title>.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta
 */
function meta(): Meta
{
    return new Meta();
}

/**
 * The HTML <meter> element represents either a scalar value within a known range or a fractional value.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meter
 */
function meter(): Meter
{
    return new Meter();
}

function nav(): Nav
{
    return new Nav();
}

/**
 * The HTML <ol> element represents an ordered list of items — typically rendered as a numbered list.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol
 */
function ol(): Ol
{
    return new Ol();
}

/**
 * The HTML <optgroup> element creates a grouping of options within a <select> element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/optgroup
 */
function optgroup(): Optgroup
{
    return new Optgroup();
}

/**
 * The HTML <option> element is used to define an item contained in a <select>, an <optgroup>, or a <datalist> element.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/option
 */
function option(): Option
{
    return new Option();
}

function p(): P
{
    return new P();
}

function pre(): Pre
{
    return new Pre();
}

/**
 * The HTML <progress> element displays an indicator showing the completion progress of a task, typically displayed as a progress bar.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/progress
 */
function progress(): Progress
{
    return new Progress();
}

/**
 * The HTML <script> element is used to embed executable code or data; this is typically used to embed or refer to JavaScript code.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
 */
function script(): Script
{
    return new Script();
}

function section(): Section
{
    return new Section();
}

/**
 * The HTML <select> element represents a control that provides a menu of options.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select
 */
function select(): Select
{
    return new Select();
}

function small(): Small
{
    return new Small();
}

function span(): Span
{
    return new Span();
}

function strong(): Strong
{
    return new Strong();
}

/**
 * The HTML <style> element contains style information for a document, or part of a document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/style
 */
function style(): Style
{
    return new Style();
}

/**
 * The HTML <sub> element specifies inline text which should be displayed as subscript for solely typographical reasons.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/sub
 */
function sub(): Sub
{
    return new Sub();
}

function summary(): Summary
{
    return new Summary();
}

/**
 * The HTML <sup> element specifies inline text which is to be displayed as superscript for solely typographical reasons.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/sup
 */
function sup(): Sup
{
    return new Sup();
}

function tbody(): TBody
{
    return new TBody();
}

function tfoot(): TFoot
{
    return new TFoot();
}

function thead(): THead
{
    return new THead();
}

function table(): Table
{
    return new Table();
}

/**
 * The HTML <td> element defines a cell of a table that contains data.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/td
 */
function td(): Td
{
    return new Td();
}

/**
 * The HTML <textarea> element represents a multi-line plain-text editing control, useful when you want to allow users to enter a sizeable amount of free-form text, for example a comment on a review or feedback form.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea
 */
function textarea(): TextArea
{
    return new TextArea();
}

/**
 * The HTML <th> element defines a cell as header of a group of table cells.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th
 */
function th(): Th
{
    return new Th();
}

/**
 * The HTML <time> element represents a specific period in time.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/time
 */
function time(): Time
{
    return new Time();
}

/**
 * The HTML <title> element defines the document's title that is shown in a browser's title bar or a page's tab.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/title
 */
function title(): Title
{
    return new Title();
}

/**
 * The HTML <tr> element defines a row of cells in a table.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tr
 */
function tr(): Tr
{
    return new Tr();
}

/**
 * The HTML <u> element represents text that should be stylistically different from normal text, typically rendered as underlined.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/u
 */
function u(): U
{
    return new U();
}

/**
 * The HTML <ul> element represents an unordered list of items.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ul
 */
function ul(): Ul
{
    return new Ul();
}

/**
 * The HTML <video> element embeds a media player which supports video playback into the document.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video
 */
function video(): Video
{
    return new Video();
}
