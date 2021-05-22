<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ciudades Controller
 *
 * @property \App\Model\Table\CiudadesTable $Ciudades
 * @method \App\Model\Entity\Ciudade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CiudadesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ciudades = $this->paginate($this->Ciudades);

        $this->set(compact('ciudades'));
    }

    /**
     * View method
     *
     * @param string|null $id Ciudade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciudade = $this->Ciudades->get($id, [
            'contain' => ['Participantes'],
        ]);

        $this->set(compact('ciudade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciudade = $this->Ciudades->newEmptyEntity();
        if ($this->request->is('post')) {
            $ciudade = $this->Ciudades->patchEntity($ciudade, $this->request->getData());
            if ($this->Ciudades->save($ciudade)) {
                $this->Flash->success(__('The ciudade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciudade could not be saved. Please, try again.'));
        }
        $this->set(compact('ciudade'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciudade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciudade = $this->Ciudades->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciudade = $this->Ciudades->patchEntity($ciudade, $this->request->getData());
            if ($this->Ciudades->save($ciudade)) {
                $this->Flash->success(__('The ciudade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciudade could not be saved. Please, try again.'));
        }
        $this->set(compact('ciudade'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciudade id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciudade = $this->Ciudades->get($id);
        if ($this->Ciudades->delete($ciudade)) {
            $this->Flash->success(__('The ciudade has been deleted.'));
        } else {
            $this->Flash->error(__('The ciudade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
