<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Participantes Controller
 *
 * @property \App\Model\Table\ParticipantesTable $Participantes
 * @method \App\Model\Entity\Participante[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParticipantesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ciudades'],
        ];
        $participantes = $this->paginate($this->Participantes);

        $this->set(compact('participantes'));
    }
    
    public function first()
    {
        $participantes = $this->Participantes->find('all', [
            'contain' => ['Ciudades'],
            'order' => ['Participantes.created desc'],
            'limit' => 5            
            
        ]) ;

        $this->set(compact('participantes'));
    }
    
    public function last()
    {
        $participantes = $this->Participantes->find('all', [
            'contain' => ['Ciudades'],
            'order' => ['Participantes.created asc'],
            'limit' => 5            
            
        ]) ;

        $this->set(compact('participantes'));
    }    

    /**
     * View method
     *
     * @param string|null $id Participante id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participante = $this->Participantes->get($id, [
            'contain' => ['Ciudades'],
        ]);

        $this->set(compact('participante'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $participante = $this->Participantes->newEmptyEntity();
        if ($this->request->is('post')) {
            $participante = $this->Participantes->patchEntity($participante, $this->request->getData());
            if ($this->Participantes->save($participante)) {
                $this->Flash->success(__('The participante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participante could not be saved. Please, try again.'));
        }
        $ciudades = $this->Participantes->Ciudades->find('list', ['limit' => 200]);
        $this->set(compact('participante', 'ciudades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Participante id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participante = $this->Participantes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participante = $this->Participantes->patchEntity($participante, $this->request->getData());
            if ($this->Participantes->save($participante)) {
                $this->Flash->success(__('The participante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participante could not be saved. Please, try again.'));
        }
        $ciudades = $this->Participantes->Ciudades->find('list', ['limit' => 200]);
        $this->set(compact('participante', 'ciudades'));
    }
    
    /**
     * lottery method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function lottery()
    {
            $query = $this->Participantes->find('all', [
                'conditions' => ['winner' => true]
            ]);
            $winners_number = $query->count();

            if ($winners_number<3) {
                $winner = $this->Participantes->find('all', ['conditions' => ['winner' => false], 'contain' => 'Ciudades'])
                    ->order('rand()')
                    ->first();
                if(!$winner) {
                    $winner = (object)[];
                    $winner->error = 1;
                    $winner->error_msg = "No se encuentran suficientes participantes"; 
                }else {
                    $winner->winner = true;
                    if (!$this->Participantes->save($winner)) {
                        $winner->error = 2;
                        $winner->error_msg = "El participante no pudo ser almacenado como ganador"; 
                    } 
                }                              
            } else {
                $winner->error = 3;
                $winner->error_msg = "Ya tenemos los tres ganadores";
            }
        $this->set('winner', $winner);
        $this->set('_serialize', ['winner']);
        $this->RequestHandler->renderAs($this, 'json');
    }
    
    public function listjs()
    {
        $this->paginate = [
            'contain' => ['Ciudades'],
        ];
        $participantes = $this->paginate($this->Participantes);

        $this->set(compact('participantes'));
        $this->set('_serialize', ['participantes']);
        $this->RequestHandler->renderAs($this, 'json');
    }
    
    public function play()
    {
        $query = $this->Participantes->find('all', [
                'conditions' => ['winner' => true], 
                'contain' => ['Ciudades']
            ]);
        $winners_number = $query->count();
        $winners = $query->all();
        $this->set(compact('winners', 'winners_number'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Participante id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $participante = $this->Participantes->get($id);
        if ($this->Participantes->delete($participante)) {
            $this->Flash->success(__('The participante has been deleted.'));
        } else {
            $this->Flash->error(__('The participante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
