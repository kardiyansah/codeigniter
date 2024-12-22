<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Comic;
use Config\App;
use PhpParser\Node\Expr\Empty_;

class Comics extends ResourceController
{
  protected $comicModel;

  public function __construct()
  {
    $this->comicModel = new Comic;
    helper('form');
    session();
  }

  /**
   * Return an array of resource objects, themselves in array format.
   *
   * @return ResponseInterface
   */
  public function index()
  {
    // Connect database without model
    // $db = \Config\Database::connect();
    // $comics = $db->query("SELECT * FROM comics");
    // foreach( $comics->getResultArray() as $comic ) {
    //   d($comic);
    // }

    $data = [
      'title' => 'List Comics',
      // 'comics' => $this->comicModel->findAll()
      'comics' => $this->comicModel->getComic()
    ];

    return view('comics/index', $data);
  }

  /**
   * Return the properties of a resource object.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function show($slug = null)
  {
    $data = [
      'title' => 'Detail Comic',
      // 'comic' => $this->comicModel->where(['slug' => $slug])->first()
      'comic' => $this->comicModel->getComic($slug)
    ];

    // if comic not found in table
    if (empty($data['comic'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Comic $slug does not found");
    }

    return view('comics/show', $data);
  }

  /**
   * Return a new resource object, with default properties.
   *
   * @return ResponseInterface
   */
  public function new()
  {
    $data = [
      'title' => 'Form Add New Comic',
      'validation' => (session()->getFlashdata('validation')) ? session()->getFlashdata('validation') : service('validation')
    ];

    return view('comics/new', $data);
  }

  /**
   * Create a new resource object, from "posted" parameters.
   *
   * @return ResponseInterface
   */
  public function create()
  {
    if (!$this->validate([
      'title' => [
        'rules' => 'required|is_unique[comics.title]'
        // 'errors' => [
        //   'required' => '{field} harus diisi'
        // ]
      ],
      'author' => [
        'rules' => 'required'
      ],
      'publisher' => [
        'rules' => 'required'
      ]
    ])) {
      // session()->setFlashdata('validation', service('validation'));
      return redirect()->to('comics/new')->withInput()->with('validation', service('validation'));
    }

    $coverImage = $this->request->getFile('cover');
    // whether any images are uploaded
    if ($coverImage->getError() != 4) {
      // generate random name
      $coverName = $coverImage->getRandomName();
      // move file to img directory/folder
      $coverImage->move('img', $coverName);
    } else {
      $coverName = 'default.png';
    }

    $data = [
      'title'     => $this->request->getVar('title'),
      'slug'      => url_title($this->request->getVar('title'), '-', true),
      'author'    => $this->request->getVar('author'),
      'publisher' => $this->request->getVar('publisher'),
      'cover'     => $coverName
    ];

    $this->comicModel->save($data);

    session()->setFlashdata('message', 'Comic has been created');
    return redirect()->to('/comics');
  }

  /**
   * Return the editable properties of a resource object.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function edit($slug = null)
  {
    $data = [
      'title' => 'Form Edit Comic',
      'validation' => session()->getFlashdata('validation'),
      'comic' => $this->comicModel->getComic($slug)
    ];

    return view('comics/edit', $data);
  }

  /**
   * Add or update a model resource, from "posted" properties.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function update($id = null)
  {
    $comic = $this->comicModel->where(['id' => $id])->first();

    // old way
    // if ($comic['title'] == $this->request->getVar('title')) {
    //   $titleRules = 'required';
    // } else {
    //   $titleRules = 'required|is_unique[comics.title]';
    // }

    if (!$this->validate([
      'title' => [
        'rules' => 'required|is_unique[comics.title,id,' . $id . ']'
        // 'rules' => $titleRules
        // 'errors' => [
        //   'required' => '{field} harus diisi'
        // ]
      ],
      'author' => [
        'rules' => 'required'
      ],
      'publisher' => [
        'rules' => 'required'
      ]
    ])) {
      session()->setFlashdata('validation', \Config\Services::validation());
      return redirect()->to('comics/' . $comic['slug'] . '/edit')->withInput();
    }

    $coverImage = $this->request->getFile('cover');
    $oldCover = $this->request->getVar('cover');
    // check, is image changed
    if ($coverImage->getError() != 4) {
      // generate random name
      $coverName = $coverImage->getRandomName();
      // move file to img directory/folder
      $coverImage->move('img', $coverName);
      // delete old cover
      if ($oldCover != 'default.png') {
        unlink('img/' . $oldCover);
      }
    } else {
      $coverName = $oldCover;
    }

    $data = [
      'id'        => $id,
      'title'     => $this->request->getVar('title'),
      'slug'      => url_title($this->request->getVar('title'), '-', true),
      'author'    => $this->request->getVar('author'),
      'publisher' => $this->request->getVar('publisher'),
      'cover'     => $coverName
    ];

    $this->comicModel->save($data);

    session()->setFlashdata('message', 'Comic has been updated');
    return redirect()->to('/comics');
  }

  /**
   * Delete the designated resource object from the model.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function delete($id = null)
  {
    // Query data by id
    $coverName = $this->comicModel->find($id)['cover'];

    if ($coverName != 'default.png') {
      unlink('img/' . $coverName);
    }

    $this->comicModel->delete($id);
    return redirect()->to('comics')->with('message', 'Comic has been deleted');
  }
}
