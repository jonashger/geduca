package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QRecuperaSenha is a Querydsl query type for RecuperaSenha
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QRecuperaSenha extends EntityPathBase<RecuperaSenha> {

    private static final long serialVersionUID = -1945055212L;

    public static final QRecuperaSenha recuperaSenha = new QRecuperaSenha("recuperaSenha");

    public final NumberPath<Long> ativo = createNumber("ativo", Long.class);

    public final DateTimePath<java.util.Date> dataSolicitacao = createDateTime("dataSolicitacao", java.util.Date.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final NumberPath<Long> pessoa = createNumber("pessoa", Long.class);

    public final StringPath token = createString("token");

    public QRecuperaSenha(String variable) {
        super(RecuperaSenha.class, forVariable(variable));
    }

    public QRecuperaSenha(Path<? extends RecuperaSenha> path) {
        super(path.getType(), path.getMetadata());
    }

    public QRecuperaSenha(PathMetadata<?> metadata) {
        super(RecuperaSenha.class, metadata);
    }

}

