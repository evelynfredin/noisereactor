import FormInput from '@/Components/Form/FormInput';
import FormItemWrapper from '@/Components/Form/FormItemWrapper';
import FormLabel from '@/Components/Form/FormLabel';
import FormTextArea from '@/Components/Form/FormTextArea';
import { Button } from '@/Components/Global/Button';
import Admin from '@/Layouts/Admin';
import { useForm } from '@inertiajs/inertia-react';
import React, { ChangeEvent, FormEvent } from 'react';

interface CreateInput extends HTMLInputElement {
  name: 'title' | 'edition' | 'released_date';
}

interface CreateTextArea extends HTMLTextAreaElement {
  name: 'description';
}

interface CreateSelectElement extends HTMLSelectElement {
  name: 'artist_id' | 'label_id';
}

interface FormElements extends HTMLFormControlsCollection {
  title: CreateInput;
  artist_id: CreateSelectElement;
  edition: CreateInput;
  label_id: CreateSelectElement;
  description: CreateTextArea;
  released_date: CreateInput;
}

interface CreateForm extends HTMLFormElement {
  readonly elements: FormElements;
}

type Form = {
  title: string;
  artist_id: number;
  edition: string;
  label_id: number;
  description: string;
  released_date: string;
};

type Props = {
  artists: App.Artist[];
  labels: App.Label[];
  label_id: number;
  artist_id: number;
};

const CreateAlbum = ({ artists, labels, artist_id, label_id }: Props) => {
  const { data, setData, post, processing, errors } = useForm<Form>({
    title: '',
    artist_id,
    edition: '',
    label_id,
    description: '',
    released_date: '',
  });

  function handleChange(e: ChangeEvent<CreateInput>): void;
  function handleChange(e: ChangeEvent<CreateTextArea>): void;
  function handleChange(e: ChangeEvent<CreateSelectElement>): void;
  function handleChange(
    e:
      | ChangeEvent<CreateInput>
      | ChangeEvent<CreateTextArea>
      | ChangeEvent<CreateSelectElement>
  ) {
    setData(e.target.name, e.target.value);
  }

  const handleSubmit = (e: FormEvent<CreateForm>) => {
    e.preventDefault();
    void post(route('album.store'));
  };

  return (
    <Admin title="Create album">
      <form onSubmit={handleSubmit}>
        <FormItemWrapper>
          <FormLabel label="Album title:" htmlFor="title" />
          <FormInput
            type="text"
            name="title"
            onChange={handleChange}
            value={data.title}
          />
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Artist:" htmlFor="artist_id" />
          <select
            className="bg-gray-50 border-gray-200 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500"
            name="artist_id"
            defaultValue={data.artist_id}
            onChange={handleChange}
          >
            <option>Select artist</option>
            {artists.map((artist) => (
              <option key={artist.id} value={artist.id}>
                {artist.name}
              </option>
            ))}
          </select>
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Album edition:" htmlFor="edition" />
          <FormInput
            type="text"
            name="edition"
            onChange={handleChange}
            value={data.edition}
          />
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Label:" htmlFor="label_id" />
          <select
            className="bg-gray-50 border-gray-200 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500"
            name="label_id"
            defaultValue={data.label_id}
            onChange={handleChange}
          >
            <option>Select artist</option>
            {labels.map((label) => (
              <option key={label.id} value={label.id}>
                {label.name}
              </option>
            ))}
          </select>
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Description:" htmlFor="description" />
          <FormTextArea
            name="description"
            value={data.description}
            onChange={handleChange}
          />
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Release date:" htmlFor="released_date" />
          <FormInput
            type="date"
            name="released_date"
            onChange={handleChange}
            value={data.released_date}
          />
        </FormItemWrapper>

        <Button>Create album</Button>
      </form>
    </Admin>
  );
};

export default CreateAlbum;
