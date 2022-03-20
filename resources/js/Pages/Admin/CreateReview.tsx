import FormInput from '@/Components/Form/FormInput';
import FormItemWrapper from '@/Components/Form/FormItemWrapper';
import FormLabel from '@/Components/Form/FormLabel';
import FormTextArea from '@/Components/Form/FormTextArea';
import { Button } from '@/Components/Global/Button';
import Admin from '@/Layouts/Admin';
import React from 'react';

const CreateReview = () => {
  return (
    <Admin title="Add review">
      <form className="my-10">
        <FormItemWrapper>
          <FormLabel label="Excerpt:" htmlFor="excerpt" />
          <FormTextArea
            name="excerpt"
            cols={30}
            rows={5}
            value={'d'}
            onChange={() => 'ld'}
          />
        </FormItemWrapper>

        <FormItemWrapper>
          <FormLabel label="Content" htmlFor="content" />
          <FormTextArea name="content" value={'d'} onChange={() => 'ld'} />
        </FormItemWrapper>

        <div className="flex space-x-2 mb-5 items-center">
          <FormLabel label="Publish:" htmlFor="is_published" />
          <FormInput
            type="checkbox"
            name="is_published"
            value={'d'}
            onChange={() => 'ld'}
          />
        </div>

        <Button>Save review</Button>
      </form>
    </Admin>
  );
};

export default CreateReview;
